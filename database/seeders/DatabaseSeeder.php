<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\PlanTypes;
use App\Models\Admin;
use App\Models\SellType;
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

        // create default sell types
        SellType::factory()->create([
            'title' => 'فروش نقدی',
            'code'  => PlanTypes::CASH
        ]);
        SellType::factory()->create([
            'title' => 'فروش اقساطی',
            'code'  => PlanTypes::INSTALLMENTS
        ]);
    }
}
