<?php

namespace Database\Factories;

use App\Models\References;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReferencesFactory extends Factory
{
    protected $model = References::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'name' => $this->faker->name(),
            'position' => $this->faker->word(),
            'company' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
