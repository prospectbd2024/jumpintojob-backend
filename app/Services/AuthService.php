<?php

namespace App\Services;

use App\Jobs\api\v1\EmailVerificationJob;
use App\Models\Address;
use App\Models\Company;
use App\Models\Employer;
use App\Models\Profile;
use App\Models\User;
use App\Notifications\NewUserEmailVerificationNotification;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Support\Facades\Notification;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthService
{
    protected mixed $request;
    protected mixed $user;
    protected mixed $company;

    public function setRequest($request): void
    {
        $this->request = $request;
    }

    public function createJobSeeker(): void
    {
        $user = new User($this->request->validated());
        $user->save();
        if (!app()->environment('local')) {
            $ip = $this->request->ip();
            $location = Location::get($ip);
            $user->update([
                'ip' => $location->ip,
                'first_name' => $this->request->first_name,
                'last_name' => $this->request->last_name,
                'iso_code' => $location->isoCode,
                'country' => $location->countryName,
                'city' => $location->cityName,
                'state' => $location->regionName,
                'postal_code' => $location->postalCode,
                'lat' => $location->latitude,
                'lon' => $location->longitude,
                'zip_code' => $location->zipCode,
                'timezone' => $location->timezone,
            ]);
        } else {
            $user->update([
                'first_name' => $this->request->first_name,
                'last_name' => $this->request->last_name,
            ]);
        }
        $user->save();
        $this->user = $user;
    }

    public static function sendWelcomeEmailToUser($user): void
    {
        try {
            $user->notify(new WelcomeEmailNotification($user));
        } catch (\Exception $e) {
            errorResponse($e, 'Something went wrong. Please try again later.', ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createAddress(): void
    {
        $address = new Address([
            'user_id' => auth()->id(),
            'address' => '',
            'address_type' => 'present',
        ]);
        $this->user->addresses()->save($address);
    }

    public function sendVerificationCode($method): \Illuminate\Http\JsonResponse
    {
        if ($this->user->email_verified_at == null && $method == 'email') {
            try {
                EmailVerificationJob::dispatch($this->user);
            } catch (\Exception $e) {
                return errorResponse($e, 'Something went wrong sending verification email. Please try again later.', ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
            }
            //            else {
            //                $otpController = new OTPVerificationController();
            //                $otpController->send_code($this->user);
            //            }

            return response()->json([
                'message' => 'Verification code sent successfully.'
            ]);
        } else {
            return response()->json([
                'message' => 'User already verified.'
            ], 400);
        }
    }

    /**
     * @return mixed
     */
    public function getUser(): mixed
    {
        return $this->user;
    }

    public function createEmployer(): void
    {
        $user = new User($this->request->safe()->except(['company_name', 'company_type']));
        $user->save();

        // $ip = $this->request->ip();
        //        $location = Location::get($ip);
        $user->update([
            //            'ip' => $location->ip,
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            //            'iso_code' => $location->isoCode,
            //            'country' => $location->countryName,
            //            'city' => $location->cityName,
            //            'state' => $location->regionName,
            //            'postal_code' => $location->postalCode,
            //            'lat' => $location->latitude,
            //            'lon' => $location->longitude,
            //            'zip_code' => $location->zipCode,
            //            'timezone' => $location->timezone,
        ]);
        $user->save();

        $this->user = $user;

        $employer = new Employer([
            'company_id' => $this->company->id,
            'user_id' => $this->user->id,
            'email' => $this->request->email,
        ]);
        $this->user->employer()->save($employer);
    }

    public function createCompany(): void
    {
        // dd($this->request->safe()->only(['name', 'email', 'company_type', 'slug']));
        // $this->company = new Company($this->request->safe()->only(['name', 'email', 'company_type', 'slug']));
        $company = new Company;
        $company->name = $this->request->name;
        $company->email = $this->request->email;
        $company->company_type = $this->request->company_type;
        $company->slug = $this->request->slug;
        $company->save();
        $this->company = $company;
    }

    // Create a new profile document for jobSeeker
    public function createJobSeekerProfile(): void
    {
        $profile = new Profile();
        $profile->user_id = $this->user->id;
        $profile->payload = User::jobSeekerProfileResource($this->user);
        $profile->save();
    }
}
