<?php

namespace Database\Factories;

use App\Models\Cv;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CvFactory extends Factory
{
    protected $model = Cv::class;

    public function definition(): array
    {
        return [
            'user_id' => rand(1,1000),
            'cv_link' => $this->faker->url(),
            'title' => $this->faker->title(),
            'summary' => $this->faker->text(),
            'created_at' => Carbon::now()->subDays(rand(1, 100)),
            'updated_at' => Carbon::now()->subDays(rand(1, 100)),
        ];
    }
}
