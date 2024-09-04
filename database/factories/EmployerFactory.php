<?php

namespace Database\Factories;

use App\Models\Address;
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
        $user = User::factory(1)->create()->first();
        $company = CompanyModel::get()->random();

        $addressTypes = ['primary', 'permanent'];
        Address::create([
            'user_id' => $user->id,
            'address' => $this->faker->address(),
            'address_type' => $addressTypes[rand(0, 1)]
        ]);
        $email = fake()->safeEmail();
        return [
            'company_id' => $company->id,
            'user_id' => $user->id,
            'name' => $this->faker->name(),
            'email' => $email,
            'phone' => fake()->randomDigit(10),
            'position' => $this->faker->jobTitle(),
            'avatar' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
