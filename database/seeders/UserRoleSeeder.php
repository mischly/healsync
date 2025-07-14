<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole  = Role::where('name', 'user')->first();

        // Assign admin role to admin
        $admin = User::where('email', 'admin@example.com')->first();
        $admin->roles()->attach($adminRole);
        
        // Assign user role to regular user
        $user = User::where('email', 'user@example.com')->first();
        $user->roles()->attach($userRole);
    }
}
