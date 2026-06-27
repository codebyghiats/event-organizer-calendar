<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use App\Models\Family;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index(Family $family)
    {
        // Pastikan hanya admin organisasi yang bisa kelola
        $member = auth()->user()->familyMembers()->where('family_id', $family->id)->where('role', 'admin')->first();
        if (!$member) {
            return redirect()->back()->with('error', 'Hanya Admin yang bisa mengelola kategori.');
        }

        $categories = $family->categories;
        return view('categories.index', compact('family', 'categories'));
    }

    public function store(Request $request, Family $family)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'color' => 'required|string|size:7',
        ]);

        $family->categories()->create([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy(EventCategory $category)
    {
        // Cek akses
        $familyId = $category->family_id;
        $member = auth()->user()->familyMembers()->where('family_id', $familyId)->where('role', 'admin')->first();
        
        if (!$member) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        $category->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
