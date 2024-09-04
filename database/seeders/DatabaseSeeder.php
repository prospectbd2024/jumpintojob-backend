<?php

namespace Database\Seeders;

use App\Models\Circular;
use App\Models\Company;
use App\Models\Employer;
use App\Models\Template;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Template::factory(10)->create();
        $this->call(SkillSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(UserPlansTableSeeder::class);
        $this->call(JobSeekerSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(CircularSeeder::class);
        $this->call(TemplateSeeder::class);
    }
}
