<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\RoleSeeder as SeedersRoleSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        $this->call([
            DepartemenSeeder::class,
            HardwareSeeder::class
        ]);
    }
}
