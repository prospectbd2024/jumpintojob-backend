<?php

namespace Database\Factories;

use App\Models\Certification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;

class CertificationsFactory extends Factory
{
    protected $model = Certification::class;

    public function definition(): array
    {
        return [
            'user_id' => User::get()->unique()->random()->id,
            'certification_name' => $this->faker->name(),
            'authority' => $this->faker->company(),
            'license_number' => $this->faker->randomNumber(),
            'start_date' => $this->faker->word(),
            'end_date' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}
