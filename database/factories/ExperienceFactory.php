<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'position' => $this->faker->word(),
            'company' => $this->faker->company(),
            'location' => $this->faker->word(),
            'start_date' => $this->faker->word(),
            'end_date' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now()->subDays(rand(1, 100)),
            'updated_at' => Carbon::now()->subDays(rand(1, 100)),
        ];
    }
}
