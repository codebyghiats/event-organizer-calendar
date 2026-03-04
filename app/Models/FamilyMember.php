<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = [
        'user_id',
        'family_id',
        'organization_id',
        'role',
        'status',
        'joined_at',
        'approved_at',
        'approved_by',
        'notes',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}