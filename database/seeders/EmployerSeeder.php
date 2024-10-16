<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployerSeeder extends Seeder
{
    public function run(): void
    {
        $email = "employer@test.com";
        $user = User::create([
            'first_name' => 'employer',
            'last_name' => 'test',
            'email' => $email,
            'email_verified_at' => now(),
            'is_verified' => 1,
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
            'user_plan_id' => 2,
            'user_type' => 'employer',
        ]);

        Employer::create([
            'company_id' => Company::get()->random()->first()->id,
            'user_id' => $user->id,
            'name' => 'employer',
            'email' => $email,
            'phone' => fake()->randomDigit(10),
            'position' => fake()->jobTitle(),
            'avatar' => fake()->imageUrl(),
        ]);

        new Address([
            'user_id' => $user->id,
            'address' => 'Dhaka',
            'address_type' => 'present',
        ]);

        Employer::factory(100)->create();
    }
}
