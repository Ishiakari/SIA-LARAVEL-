<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
        public function run(): void
        {
            // 1. Create the Owner (Admin)
            \App\Models\User::create([
                'name' => 'Zach Owner',
                'email' => 'owner@system.com',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]);

            // 2. Create the Staff
            \App\Models\User::create([
                'name' => 'Juan Staff',
                'email' => 'staff@system.com',
                'password' => bcrypt('password123'),
                'role' => 'staff',
            ]);

            // 3. Create a Regular User
            \App\Models\User::create([
                'name' => 'Regular Customer',
                'email' => 'user@system.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
            ]);
        }
}
