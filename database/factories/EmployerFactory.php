<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\User;
use App\Models\Company as CompanyModel;
use Faker\Provider\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition(): array
    {
            return [
//                'company_id' => CompanyModel::get()->unique()->id,
//                'user_id' => $user->id,
//                'name' => $this->faker->name(),
//                'email' => $this->faker->email(),
//                'phone' => $this->faker->phoneNumber(),
//                'position' => $this->faker->jobTitle(),
//                'avatar' => $this->faker->imageUrl(),
//                'created_at' => now(),
//                'updated_at' => now(),
            ];

            // Use $user and $employer as needed
        }
}
