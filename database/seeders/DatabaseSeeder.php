<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Circular;
use App\Models\Employer;

use App\Models\Company;
use App\Models\Address;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\ContactUseType;
use App\Models\Courses;
use App\Models\CV;
use App\Models\Experience;
use App\Models\Languages;
use App\Models\Profile;
use App\Models\Projects;
use App\Models\Skills;
use App\Models\User;
use App\Models\Education;
use Database\Factories\CategoryFactory;
use Database\Factories\CircularFactory;
use Database\Factories\ContactUseTypeFactory;
use Database\Factories\EmployerFactory;
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

//        Category::factory(10)->create();
        Circular::factory(50)->create();

//        Company::factory(10)->create();
//        $this->call(EmployerSeeder::class);
//          $this->call(UserPlansTableSeeder::class);
//        Employer::factory()->count(10)->create();
//        Company::factory()->count(10)->create();
//        User::factory(100)
//            ->has(Address::factory()->count(3))
//            ->has(Profile::factory()->count(1))
//            ->has(CV::factory()->count(rand(1, 5)))
//            ->has(Contact::factory()
//                ->has(ContactType::factory()
//                    ->has(ContactUseType::factory()->count(2))
//                    ->count(2)
//                )->count(2)
//            )
//            ->create();

//        User::factory(971)->create();
//        Profile::factory(971)->create();
//        CV::factory(100)->create();
//        Education::factory(100)->create();
//        Courses::factory(100)->create();
//        Experience::factory(100)->create();
//        Languages::factory(100)->create();
//        Projects::factory(100)->create();
//        Skills::factory(100)->create();
    }
}
