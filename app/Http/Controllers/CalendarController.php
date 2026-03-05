<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Calendar untuk Admin/Master (Full Access)
     */
    public function index()
    {
        $user = Auth::user();
        
        // Ambil event bulan ini saja (biar ringan)
        $events = Event::where('family_id', $user->family_id)
            ->whereBetween('start_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->select('id', 'title', 'start_date', 'end_date', 'status', 'banner', 'location')
            ->get();

        return view('C-Folder.calendar', compact('events'));
    }

    /**
     * Calendar untuk User (View Only)
     */
    public function calendarUser()
    {
<<<<<<< HEAD
        return view('C-Folder.calendar');
=======
        $user = Auth::user();
        
        // User cuma liat event approved + public
        $events = Event::where('family_id', $user->family_id)
            ->where('status', 'published') // cuma yang approved
            ->where('is_public', true)
            ->whereBetween('start_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->select('id', 'title', 'start_date', 'end_date', 'banner', 'location')
            ->get();

        return view('C-Folder.calendarUser', compact('events'));
>>>>>>> de4271005ed2398892cdfc8726cf5ce64c29c22a
    }

    /**
     * Calendar untuk Organisasi (Bisa manage event rutin)
     */
    public function calendarOrganisasi()
    {
        $user = Auth::user();
        
        // Organisasi liat event miliknya + event family
        $events = Event::where('family_id', $user->family_id)
            ->where(function($query) use ($user) {
                $query->where('organization_id', $user->organization_id)
                      ->orWhere('scope', 'family');
            })
            ->whereBetween('start_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->select('id', 'title', 'start_date', 'end_date', 'status', 'banner', 'location', 'organization_id')
            ->get();

        return view('C-Folder.calendarOrganisasi', compact('events'));
    }

    /**
     * API: Ambil event untuk calendar (AJAX)
     * Dipakai FullCalendar.js biar gak reload halaman
     */
    public function getEvents(Request $request)
    {
        $user = Auth::user();
        $start = $request->start; // format: YYYY-MM-DD
        $end = $request->end;

        $query = Event::where('family_id', $user->family_id)
            ->whereBetween('start_date', [$start, $end]);

        // Filter berdasarkan role
        if (!$user->hasRole(['master', 'admin'])) {
            $query->where('status', 'published');
        }

        $events = $query->get(['id', 'title', 'start_date', 'end_date', 'status', 'banner', 'location']);

        // Format untuk FullCalendar
        return response()->json($events->map(function($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'extendedProps' => [
                    'banner' => $event->banner,
                    'location' => $event->location,
                    'status' => $event->status,
                ],
                // Class untuk styling pending vs approved
                'classNames' => [$event->status === 'pending' ? 'event-pending' : 'event-approved']
            ];
        }));
    }
}