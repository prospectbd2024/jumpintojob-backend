<?php

namespace Database\Factories;

use App\Models\Publications;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PublicationsFactory extends Factory
{
    protected $model = Publications::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1,20000),
            'title' => $this->faker->word(),
            'publisher' => $this->faker->word(),
            'date' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
