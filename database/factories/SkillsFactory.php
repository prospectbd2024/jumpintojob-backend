<?php

namespace Database\Factories;

use App\Models\Skills;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SkillsFactory extends Factory
{
    protected $model = Skills::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'category_id' => $this->faker->randomNumber(),
            'skill_name' => $this->faker->name(),
            'proficiency' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
