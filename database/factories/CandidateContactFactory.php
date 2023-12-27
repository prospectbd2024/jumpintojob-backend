<?php
namespace Database\Factories;

use App\Models\CandidateContact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CandidateContactFactory extends Factory
{
    protected $model = CandidateContact::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
        ];
    }
}
        