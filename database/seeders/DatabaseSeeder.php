<?php

namespace Database\Seeders;

use App\Models\Candidate;

use App\Models\Application;

use App\Models\Notification;

use App\Models\Category;
use App\Models\Circular;
use App\Models\Employer;

use App\Models\Company;
use App\Models\Address;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\ContactUseType;
use App\Models\Course;
use App\Models\Cv;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Template;
use App\Models\User;
use App\Models\Education;
use Database\Factories\CategoryFactory;
use Database\Factories\CircularFactory;
use Database\Factories\ContactUseTypeFactory;
use Database\Factories\EmployerFactory;
use Database\Factories\TemplateFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Template::factory(10)->create();
        Category::factory(10)->create();
        Company::factory(3)->create();
        User::factory(10)->create();
        Employer::factory(3)->create();
        Circular::factory(3)->create();
        $this->call(UserPlansTableSeeder::class);
    }
}
