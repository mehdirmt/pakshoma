<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create default super admin
        Admin::factory()->create([
            'username' => 'admin',
            'email'    => 'admin@pakshoma.com',
        ]);
    }
}
