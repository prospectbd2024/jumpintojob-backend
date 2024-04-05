<?php
namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name($maxNbChars = 50), 
            'logo' => $this->faker->imageUrl(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'cover_image' => $this->faker->imageUrl(),
            'description' => $this->faker->realText(200),
            'category_id' => random_int(1,10),
            'location' => $this->faker->city(),
            'company_type' => $this->faker->randomElement(['private', 'public']),
            'slug' => $this->faker->slug(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
