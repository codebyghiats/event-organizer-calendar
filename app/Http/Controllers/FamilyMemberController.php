<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class FamilyMemberController extends Controller
{
    /**
     * Approve semua member yang statusnya pending
     */
    public function approveAll(Family $family)
    {
        $admin = request()->user();

        if (!$family->isAdmin($admin)) {
            abort(403, 'Kamu tidak punya izin.');
        }

        $affected = DB::table('family_members')
            ->where('family_id', $family->id)
            ->where('status', 'pending')
            ->update([
                'status' => 'active',
                'approved_at' => now(),
                'approved_by' => $admin->id,
                'updated_at' => now(),
            ]);

        return back()->with('success', $affected . ' member berhasil di-approve.');
    }

    public function index(Family $family)
    {
        $members = $family->users()
            ->wherePivot('status', 'active')
            ->select('users.id', 'users.name', 'users.email') // ambil seperlunya
            ->paginate(15);

        return view('families.members', compact('family', 'members'));
    }
}