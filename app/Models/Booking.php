<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Model
    protected $fillable = [
        'name', 'email', 'phone', 'media', 'organization', 'referral_source'
    ];
}
