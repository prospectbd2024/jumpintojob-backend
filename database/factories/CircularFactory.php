<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Circular;
use App\Models\Company;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CircularFactory extends Factory
{
    protected $model = Circular::class;

    public function definition(): array
    {
        $employer = Employer::get()->random();
        $category = Category::get()->random();
        return [
            'employer_id' => $employer->id,
            'category_id' => $category->id,
            'company_id' => $employer->company->id,
            'title' => $this->faker->jobTitle(20),
            'description' => $this->faker->realText(1500),
            'location' => $this->faker->city(),
            'location_type' => $this->faker->randomElement(['remote', 'office']),
            'vacancies' => $this->faker->numberBetween(1, 10),
            'employment_type' => $this->faker->randomElement(['full-time', 'part-time']),
            'salary' => $this->faker->numberBetween(10000, 150000),
            'educational_requirements' => $this->faker->text(),
            'responsibilities' => $this->faker->text(),
            'experience' => $this->faker->text(),
            'experience_level' => $this->faker->randomElement(['entry-level', 'mid-level', 'senior-level']),
            'deadline' => now()->format('Y-m-d'),
            'is_remote' => rand(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
