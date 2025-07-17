<?php

// app/Models/Mentor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama', 'bidang', 'biodata', 'foto'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function jadwalPraktek()
    {
        return $this->hasMany(JadwalPraktek::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
