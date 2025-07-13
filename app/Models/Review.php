<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
