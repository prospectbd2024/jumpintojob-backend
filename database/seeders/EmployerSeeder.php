<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployerSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::get();

        foreach ($companies as $company) {
            $user = User::create([
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $employer = Employer::factory(1)->create([
                'company_id' => $company->id,
                'user_id' => $user->id,
                'name' => fake()->name(),
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'position' => fake()->jobTitle(),
                'avatar' => fake()->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
