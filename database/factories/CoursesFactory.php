<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CoursesFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1,20000),
            'course_name' => $this->faker->name(),
            'institution' => $this->faker->word(),
            'completion_date' => $this->faker->word(),
            'description' => $this->faker->text(),
            // set random time for created_at and updated_at
            'created_at' => Carbon::now()->subDays(rand(1, 100)),
            'updated_at' => Carbon::now()->subDays(rand(1, 100)),
        ];
    }
}
