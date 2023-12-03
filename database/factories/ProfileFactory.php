<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
           'user_id' => function () {
                return User::factory()->create()->id; // Create a user and get its ID
            },
            'avatar' => $this->faker->imageUrl(),
            'country' => $this->faker->country(),
            'state' => $this->faker->word(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'banned' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
