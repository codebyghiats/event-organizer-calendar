<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    /**
     * Approve semua member yang statusnya pending
     */
    public function approveAll(Family $family)
    {
        $admin = request()->user();

        // Cek apakah user adalah admin atau super_admin
        if (!$family->isAdmin($admin)) {
            abort(403, 'Kamu tidak punya izin.');
        }

        $affected = $family->users()
            ->wherePivot('status', 'pending')
            ->update([
                'family_members.status' => 'active',
                'family_members.approved_at' => now(),
                'family_members.approved_by' => $admin->id,
            ]);

        return back()->with('success', $affected . ' member berhasil di-approve.');
    }
}