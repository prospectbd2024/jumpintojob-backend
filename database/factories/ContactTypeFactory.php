<?php

namespace Database\Factories;

use App\Models\ContactType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContactTypeFactory extends Factory
{
    protected $model = ContactType::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'validationRegex' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
