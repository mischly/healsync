<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '08123456789',
            'password' => Hash::make('password'),
        ]);
        
        User::create([
            'name' => 'Pengguna Umum',
            'username' => 'User',
            'email' => 'user@example.com',
            'phone' => '08123456789',
            'password' => Hash::make('password'),
        ]);
    }
}
