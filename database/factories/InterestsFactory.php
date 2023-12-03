<?php

namespace Database\Factories;

use App\Models\Interests;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InterestsFactory extends Factory
{
    protected $model = Interests::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'interest_name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
