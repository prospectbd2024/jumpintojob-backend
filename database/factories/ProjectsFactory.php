<?php

namespace Database\Factories;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectsFactory extends Factory
{
    protected $model = Projects::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'project_name' => $this->faker->name(),
            'start_date' => $this->faker->word(),
            'end_date' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
