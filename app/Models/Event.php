<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'family_id',
        'organization_id',
        'category_id',
        'created_by',
        'title',
        'description',
        'type',
        'start_date',
        'end_date',
        'location',
        'meeting_link',
        'status',
        'is_public',
        'max_participants',
        'banner',
        'color',
        'proposal_file',
        'admin_notes',
        'is_routine'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_public' => 'boolean',
        'is_routine' => 'boolean',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
