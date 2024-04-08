<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeekerSeeder extends Seeder
{
    public function run(): void
    {

        $user = User::create([
            'first_name' => 'job seeker',
            'last_name' => 'test',
            'email' => 'jobseeker@test.com',
            'email_verified_at' => now(),
            'is_verified' => 1,
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
            'user_plan_id' => 2,
            'user_type' => 'job_seeker',

        ]);

        Address::create([
            'user_id' => $user->id,
            'address' => 'Dhaka',
            'address_type' => 'permanent',
        ]);
    }
}
