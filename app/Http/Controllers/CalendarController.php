<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * View kalender untuk Organisasi / Ekskul (Mode Edit & Manage)
     */
    public function calendarOrganisasi(Family $family)
    {
        // Cek jika user tergabung di unit ini
        $member = auth()->user()->familyMembers()->where('family_id', $family->id)->first();
        if (!$member) {
            return redirect('/dashboard')->with('error', 'Anda tidak tergabung di unit ini.');
        }

        // Ambil semua event yang disetujui (published)
        $events = Event::where('family_id', $family->id)
            ->where('status', 'published')
            ->with('category')
            ->get();

        // Ambil kategori untuk filter & modal
        $family->load('categories');

        return view('C-Folder.calendarOrganisasi', compact('family', 'events'));
    }

    /**
     * View kalender untuk Publik / Siswa (Mode Viewer)
     */
    public function calendarUser($familyId = null)
    {
        $families = Family::all();
        $activeFamily = null;
        $events = collect();

        if ($familyId) {
            $activeFamily = Family::with('categories')->find($familyId);
            if ($activeFamily) {
                $events = Event::where('family_id', $activeFamily->id)
                    ->where('status', 'published')
                    ->with('category')
                    ->get();
            }
        }

        return view('C-Folder.calendarUser', compact('families', 'activeFamily', 'events'));
    }

    /**
     * Halaman Admin Utama (Opsional)
     */
    public function index()
    {
        return view('C-Folder.calendar');
    }
}
