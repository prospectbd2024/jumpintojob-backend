<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobApplication::factory()->count(500)->create();
    }
}
