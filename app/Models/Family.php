<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Family extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'banner',
        'address',
        'phone',
        'email',
        'status',
        'created_by',
    ];

    /**
     * Boot method for auto slug & auto created_by
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($family) {

            // Auto generate slug
            if (empty($family->slug)) {
                $family->slug = Str::slug($family->name) . '-' . uniqid();
            }

            // Auto isi created_by kalau ada user login
            if (empty($family->created_by) && Auth::check()) {
            $family->created_by = Auth::id();
            }
        });
    }

    /**
     * Relasi ke User (creator)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'family_members')
                ->withPivot([
                    'role',
                    'status',
                    'organization_id',
                    'joined_at',
                    'approved_at',
                    'approved_by',
                    'notes'
                ])
                ->withTimestamps();
    }

    public function isAdmin(User $user): bool
    {
        return $this->users()
            ->where('user_id', $user->id)
            ->whereIn('role', ['super_admin', 'admin'])
            ->where('status', 'active')
            ->exists();
    }

    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }

    // Alternatif lebih semantik:
    // public function creator()
    // {
    //     return $this->belongsTo(User::class, 'created_by');
    // }
}