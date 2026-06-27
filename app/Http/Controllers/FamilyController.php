<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FamilyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $family = Family::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'invite_code_organisasi' => Str::random(10),
            'invite_code_viewer' => Str::random(10),
        ]);

        // Secara otomatis jadikan pembuat sebagai Admin
        $family->users()->attach(auth()->id(), ['role' => 'admin']);

        return back()->with('success', 'Unit Organisasi berhasil dibuat!');
    }

    public function joinByToken($token)
    {
        $family = Family::where('invite_code_organisasi', $token)->first();
        $role = 'organisasi';

        if (!$family) {
            $family = Family::where('invite_code_viewer', $token)->first();
            $role = 'viewer';
        }

        if (!$family) {
            return redirect('/dashboard')->with('error', 'Link undangan tidak valid.');
        }

        // Cek jika sudah bergabung
        if ($family->users()->where('user_id', auth()->id())->exists()) {
            return redirect('/dashboard')->with('error', 'Anda sudah bergabung di unit ini.');
        }

        $family->users()->attach(auth()->id(), ['role' => $role]);

        return redirect('/dashboard')->with('success', 'Berhasil bergabung dengan unit: ' . $family->name);
    }
}
