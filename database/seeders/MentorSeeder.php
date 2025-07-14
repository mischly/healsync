<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mentor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MentorSeeder extends Seeder
{
    public function run(): void
    {
        $mentors = [
            ['nama' => 'Andini Putri', 'bidang' => 'Psikologi Klinis', 'email' => 'andini@example.com'],
            ['nama' => 'Ahmad Fauzi', 'bidang' => 'Konseling Remaja', 'email' => 'ahmad@example.com'],
            ['nama' => 'Rina Lestari', 'bidang' => 'Psikologi Pendidikan', 'email' => 'rina@example.com'],
            ['nama' => 'Dian Ramadhan', 'bidang' => 'Konseling Keluarga', 'email' => 'dian@example.com'],
            ['nama' => 'Fajar Hidayat', 'bidang' => 'Psikologi Industri', 'email' => 'fajar@example.com'],
            ['nama' => 'Intan Pratiwi', 'bidang' => 'Terapi Perilaku', 'email' => 'intan@example.com'],
            ['nama' => 'Yusuf Maulana', 'bidang' => 'Psikologi Anak', 'email' => 'yusuf@example.com'],
            ['nama' => 'Nadia Salsabila', 'bidang' => 'Konseling Pernikahan', 'email' => 'nadia@example.com'],
            ['nama' => 'Bayu Setiawan', 'bidang' => 'Terapi Kognitif', 'email' => 'bayu@example.com'],
            ['nama' => 'Laras Nuraini', 'bidang' => 'Psikologi Sosial', 'email' => 'laras@example.com'],
        ];

        
        foreach ($mentors as $data) {
            $user = User::create([
                'name' => $data['nama'],
                'username' => strtolower(Str::slug($data['nama'], '_')), // auto generate username dari nama
                'email' => $data['email'],
                'phone' => '08' . rand(1111111111, 9999999999), // random dummy phone
                'password' => Hash::make('password'),
            ]);

            Mentor::create([
                'user_id' => $user->id,
                'nama' => $data['nama'],
                'bidang' => $data['bidang'],
                'biodata' => 'Saya adalah seorang profesional di bidang ' . strtolower($data['bidang']) . ' dengan pengalaman lebih dari 5 tahun.',
                'foto' => null,
            ]);
        }
    }
}
