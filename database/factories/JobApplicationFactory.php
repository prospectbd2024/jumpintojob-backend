<?php

namespace Database\Factories;

use App\Models\Circular;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('user_type', 'job_seeker')->inRandomOrder()->first()->id, // Filter for job seekers
            'job_id' => Circular::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['pending', 'shortlisted', 'rejected', 'hired', 'interviewed']),
            'cv_id' => $this->faker->numberBetween(1, 100),
            'cv_file' => $this->faker->filePath(), // Or null if you want no file by default
            'forwarding_letter_type' => $this->faker->randomElement(['formal', 'informal']),
            'forwarding_letter' => $this->faker->paragraph(),
            'submitted_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'interview_time' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
            'interview_notes' => $this->faker->optional()->sentence(),
            'rejection_reason' => $this->faker->optional()->sentence(),
        ];
    }
}
