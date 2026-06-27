<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'name',
        'color',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'category_id');
    }
}
