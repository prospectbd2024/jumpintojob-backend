<?php

namespace Database\Factories;

use App\Models\Languages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LanguagesFactory extends Factory
{
    protected $model = Languages::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'language_name' => $this->faker->name(),
            'proficiency' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
