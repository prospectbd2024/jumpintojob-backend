<?php

namespace Database\Factories;

use App\Models\ContactUseType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContactUseTypeFactory extends Factory
{
    protected $model = ContactUseType::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
