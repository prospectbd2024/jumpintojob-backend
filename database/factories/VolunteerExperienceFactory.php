<?php

namespace Database\Factories;

use App\Models\VolunteerExperience;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VolunteerExperienceFactory extends Factory
{
    protected $model = VolunteerExperience::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'organization' => $this->faker->word(),
            'position' => $this->faker->word(),
            'start_date' => $this->faker->word(),
            'end_date' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
