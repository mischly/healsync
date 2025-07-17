<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'mentor_id',
        'metode',
        'tanggal',
        'jam',
        'keluhan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
    
    public function review()
    {
        return $this->hasOne(\App\Models\Review::class);
    }

}
