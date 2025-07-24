<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> f568b053234488fc5478ec08eabafbc4300018e1
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $fillable = [
        'mentor_id',
        'user_id',
        'rating',
        'comment',
    ];

=======
    protected $fillable = [
        'user_id',
        'mentor_id',
        'booking_id',
        'rating',
        'komentar',
    ];


>>>>>>> f568b053234488fc5478ec08eabafbc4300018e1
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
}
=======

    public function booking()
    {
        return $this->belongsTo(Booking::class);

    }
}
>>>>>>> f568b053234488fc5478ec08eabafbc4300018e1
