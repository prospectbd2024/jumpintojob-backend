<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;

class SkillsFactory extends Factory
{
    protected $model = Skill::class;

    public function definition(): array
    {
        return [
            'user_id' => User::get()->unique()->random()->id,
            'skill_name' => $this->faker->name(),
            'proficiency' => $this->faker->randomElement(['beginner', 'intermediate', 'expert']),
        ];
    }
}
