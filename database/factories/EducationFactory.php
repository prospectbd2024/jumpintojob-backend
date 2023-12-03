<?php

namespace Database\Factories;

use App\Models\CV;
use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EducationFactory extends Factory
{
    protected $model = Education::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1,100),
            'institution' => $this->faker->word(),
            'degree' => $this->faker->word(),
            'field_of_study' => $this->faker->word(),
            'start_date' => $this->faker->word(),
            'end_date' => $this->faker->word(),
            'description' => $this->faker->text(),
            'undergraduate' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

      // This callback will be triggered after an Education record is created
    public function configure()
    {
        return $this->afterCreating(function (Education $education) {
            // Associate the education with a randomly selected CV
            $cv = CV::inRandomOrder()->first();
            $education->cv_id = $cv->id;
            $education->save();
        });
    }
}
