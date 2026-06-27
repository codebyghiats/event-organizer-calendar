<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Family;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Tampilkan semua proposal yang masuk untuk Admin/Pembina.
     */
    public function adminIndex(Family $family)
    {
        // Cek Authorization
        $member = auth()->user()->familyMembers()->where('family_id', $family->id)->first();
        if (!$member || $member->role !== 'admin') {
            abort(403, 'Hanya Pembina/Admin yang bisa mengakses halaman ini.');
        }

        $proposals = Event::where('family_id', $family->id)
            ->whereIn('status', ['pending', 'revision', 'rejected'])
            ->with('creator', 'category')
            ->latest()
            ->get();

        return view('proposals.admin', compact('family', 'proposals'));
    }

    /**
     * Tampilkan daftar pengajuan saya (untuk OSIS/MPK).
     */
    public function userIndex()
    {
        $proposals = Event::where('created_by', auth()->id())
            ->with('family', 'category')
            ->latest()
            ->get();

        return view('proposals.user', compact('proposals'));
    }

    /**
     * Detail Proposal untuk direview.
     */
    public function show(Event $event)
    {
        // Cek akses
        $member = auth()->user()->familyMembers()->where('family_id', $event->family_id)->first();
        if (!$member) abort(403);

        return view('proposals.show', compact('event'));
    }

    /**
     * Proses Approve Proposal.
     */
    public function approve(Event $event)
    {
        $member = auth()->user()->familyMembers()->where('family_id', $event->family_id)->first();
        if (!$member || $member->role !== 'admin') abort(403);

        $event->update([
            'status' => 'published',
            'admin_notes' => null
        ]);

        return redirect()->route('proposals.admin', $event->family_id)
            ->with('success', 'Kegiatan "' . $event->title . '" telah disetujui dan tampil di kalender!');
    }

    /**
     * Proses Reject / Minta Revisi.
     */
    public function reject(Request $request, Event $event)
    {
        $validated = $request->validate([
            'admin_notes' => 'required|string|max:1000',
            'action' => 'required|in:reject,revision'
        ]);

        $member = auth()->user()->familyMembers()->where('family_id', $event->family_id)->first();
        if (!$member || $member->role !== 'admin') abort(403);

        $status = $validated['action'] === 'revision' ? 'revision' : 'rejected';

        $event->update([
            'status' => $status,
            'admin_notes' => $validated['admin_notes']
        ]);

        $msg = $status === 'revision' ? 'Permintaan revisi dikirim.' : 'Kegiatan ditolak.';
        return redirect()->route('proposals.admin', $event->family_id)->with('success', $msg);
    }
}
