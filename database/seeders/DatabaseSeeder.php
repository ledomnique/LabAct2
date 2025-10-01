<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // Create an admin user
            User::factory()->create([
                'name' => 'Lewis',
                'email' => 'lewis@admin.com',
                'password' => bcrypt('lewis123'),
                'role' => 'admin',
            ]);

            // Create a regular user
            User::factory()->create([
                'name' => 'Amber',
                'email' => 'amber@user.com',
                'password' => bcrypt('amber123'),
                'role' => 'user',
            ]);
    }
}
