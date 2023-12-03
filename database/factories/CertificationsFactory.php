<?php

namespace Database\Factories;

use App\Models\Certifications;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CertificationsFactory extends Factory
{
    protected $model = Certifications::class;

    public function definition(): array
    {
        return [
            'cv_id' => rand(1, 20000),
            'certification_name' => $this->faker->name(),
            'authority' => $this->faker->company(),
            'license_number' => $this->faker->randomNumber(),
            'start_date' => $this->faker->word(),
            'end_date' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
