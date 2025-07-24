<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPraktek extends Model
{
    protected $table = 'jadwal_praktek';

    protected $fillable = [
        'mentor_id',
        'hari',
        'jam',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
    
    public function booking()
    {
        return $this->hasMany(Booking::class,);
    }
}
