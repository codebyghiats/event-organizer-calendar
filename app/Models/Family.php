<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'invite_code_organisasi',
        'invite_code_viewer',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'family_members')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function categories()
    {
        return $this->hasMany(EventCategory::class);
    }
}