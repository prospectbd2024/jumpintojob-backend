<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Template;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Template::factory(10)->create();
        $this->call(CategorySeeder::class);
        Company::factory(3)->create();
        $this->call(UserPlansTableSeeder::class);
        $this->call(JobSeekerSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(CircularSeeder::class);
    }
}
