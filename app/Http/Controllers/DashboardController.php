<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ✅ OPTIMIZED: Pakai count() bukan get()
        $familiesCount = $user->families()->count();
        
        // ✅ OPTIMIZED: Query langsung, tidak load semua data
        $eventsThisMonth = Event::whereMonth('start_date', now()->month)
            ->whereYear('start_date', now()->year)
            ->count();

        // ✅ OPTIMIZED: Pakai DB::table untuk query sederhana
        $pendingMembers = DB::table('family_members')
            ->where('status', 'pending')
            ->count();

        // ✅ OPTIMIZED: Limit 5 event saja + select kolom penting
        $upcomingEvents = Event::where('start_date', '>=', now())
            ->orderBy('start_date')
            ->limit(5)
            ->get(['id', 'title', 'start_date', 'location']);

        return view('dashboard', compact(
            'familiesCount',
            'eventsThisMonth',
            'pendingMembers',
            'upcomingEvents'
        ));
    }
}

// return view('dashboard', compact(
//     'familiesCount',      // int
//     'eventsThisMonth',    // int
//     'pendingMembers',     // int
//     'totalMembers',       // int
//     'upcomingEvents'      // collection: id, title, start_date, location, status
// ));