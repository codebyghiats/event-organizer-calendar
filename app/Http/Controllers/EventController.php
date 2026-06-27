<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Store a new event proposal.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:event_categories,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:10',
            'family_id' => 'required|exists:families,id',
            'proposal_file' => 'required|file|mimes:pdf|max:10240', // Wajib PDF untuk sistem baru
        ]);

        $user = auth()->user();
        $familyId = $validated['family_id'];

        // Cek Keanggotaan
        $member = $user->familyMembers()->where('family_id', $familyId)->first();
        if (!$member) {
            abort(403, 'Akses ditolak.');
        }

        $validated['created_by'] = $user->id;
        
        // Selalu pending jika bukan admin (Sesuai permintaan rebuild sistem ajukan)
        $validated['status'] = $member->role === 'admin' ? 'published' : 'pending';

        // Handle PDF Upload
        if ($request->hasFile('proposal_file')) {
            $path = $request->file('proposal_file')->store('proposals', 'public');
            $validated['proposal_file'] = $path;
        }

        Event::create($validated);

        return back()->with('success', 'Kegiatan berhasil diajukan! Menunggu persetujuan Pembina.');
    }

    /**
     * Update event (for revision)
     */
    public function update(Request $request, Event $event)
    {
        // Logic untuk revisi proposal oleh OSIS
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'proposal_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($event->created_by !== auth()->id()) {
            abort(403);
        }

        if ($request->hasFile('proposal_file')) {
            if ($event->proposal_file) {
                Storage::disk('public')->delete($event->proposal_file);
            }
            $validated['proposal_file'] = $request->file('proposal_file')->store('proposals', 'public');
        }

        // Set status kembali ke pending setelah revisi
        $validated['status'] = 'pending';
        $event->update($validated);

        return back()->with('success', 'Proposal berhasil diperbarui dan diajukan kembali.');
    }

    public function destroy(Event $event)
    {
        if ($event->created_by !== auth()->id() && !auth()->user()->isAdminOf($event->family_id)) {
            abort(403);
        }

        if ($event->proposal_file) {
            Storage::disk('public')->delete($event->proposal_file);
        }

        $event->delete();
        return back()->with('success', 'Kegiatan berhasil dihapus.');
    }
}
