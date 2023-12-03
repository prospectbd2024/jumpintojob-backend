<?php

namespace Database\Factories;

use App\Models\SearchPreference;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SearchPreferenceFactory extends Factory
{
    protected $model = SearchPreference::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'category_id' => $this->faker->randomNumber(),
            'preferred_regions' => $this->faker->word(),
            'skills' => $this->faker->word(),
            'preferred_timezone' => $this->faker->word(),
            'experience_level' => $this->faker->word(),
            'preferred_salary_range' => $this->faker->word(),
            'authorized_to_work_in_usa' => $this->faker->boolean(),
            'has_employment_work_visa' => $this->faker->boolean(),
            'job_notification_confirmed_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
