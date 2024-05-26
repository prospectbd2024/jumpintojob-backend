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
        $profileResource = [
            'status' => 'done',
            'educations' =>[],
            'experiences' => [],
            'skills' => [],
            'languages' => [],
            'hobbies' => [],
            'personalInformation' => [
                'title' => "",
                'firstName' =>$user->first_name,
                'userType' => $user->user_type,
                'lastName' => $user->last_name,
                'avatar' => $user->profile->avatar,
                'cvProfileImage' => $user->cv_profile_image,
                'email' => $user->email,
                'phone' => $user->phone,
                'currentAddress' => [
                    'city' => $user->city,
                    'state' => $user->state,
                    'country' => $user->country,
                    'postalCode' =>$user->postal_code,
                ],
                'permanentAddress' => [
                    'city' =>$user->city,
                    'state' => $user->state,
                    'country' => $user->country,
                    'postalCode' => $user->postal_code,
                ],
                'dateOfBirth' => null,
                'gender' => null,
                'nationality' => null,
                'religion' => null,
                'maritalStatus' => null,
                'summary' => null,
                'mediaLinks' => [],
            ],
            'others' => [],
        ];

   
    \App\http\Controllers\ProfileController::create( $profileResource,$user->id );

    }
}
