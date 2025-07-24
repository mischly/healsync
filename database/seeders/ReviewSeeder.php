<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::create([
            'mentor_id' => 1,
            'user_id' => 1,
            'rating' => 5,
            'comment' => 'Layanan sangat membantu!',
        ]);
    }
}

