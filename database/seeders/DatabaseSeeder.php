<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles
        Role::create([
            "name" => "admin"
        ]);
        Role::create([
            "name" => "user"
        ]);


        // admin user
        User::factory()->create([
            'name' => 'ZulDev',
            'email' => 'zuldev@example.com',
            'password' => Hash::make("admin123"),
            "role_id" => 1
        ]);

        // user
        User::factory()->create([
            'name' => 'Zuluser',
            'email' => 'zuluser@example.com',
            'password' => Hash::make("user123"),
            "role_id" => 2
        ]);
    }
}
