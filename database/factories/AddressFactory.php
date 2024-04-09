<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        $addressTypes = ['primary', 'permanent'];
        return [
            'user_id' => User::get()->random()->id,
            'address' => $this->faker->address(),
            'address_type' => $addressTypes[rand(0, 1)]
        ];
    }
}
