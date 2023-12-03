<?php

namespace Database\Seeders;

use App\Models\UserPlan;
use Illuminate\Database\Seeder;

class UserPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data from the table
//        UserPlan::truncate();
//
        // Seed user plans
        UserPlan::create([
            'name' => 'Free',
            'description' => 'Basic plan with limited features',
            'price' => 0, // Set the price here, if applicable
        ]);

        UserPlan::create([
            'name' => 'Pro',
            'description' => 'Premium plan with advanced features',
            'price' => 499, // Set the price here, if applicable
        ]);

    }
}
