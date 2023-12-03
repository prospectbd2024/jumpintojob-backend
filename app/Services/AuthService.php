<?php

namespace App\Services;

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

    public function createProfile(): \Illuminate\Http\JsonResponse
    {
        $ip = $this->request->ip();
        $location = Location::get($ip);
        $profile = new Profile([
            'ip' => $location->ip,
            'user_id' => $this->user->id,
            'category_id' => 1,
            'banned' => 0,
// temporarily commented out

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
        // Associate the profile with the user and save both records

        $this->user->profile()->save($profile);
        return response()->json([
            'message' => 'User profile created successfully.',
            'user' => $this->user
        ]);
    }

    public static function sendVerificationCode(User $user): \Illuminate\Http\JsonResponse
    {
        if ($user->email_verified_at == null) {
            try {
//                EmailVerificationJob::dispatch($user);
//                Artisan::call('queue:work');
//                $user->notify(new NewUserEmailVerificationNotification($user));
                Notification::send($user, new NewUserEmailVerificationNotification($user));
            } catch (\Exception $e) {
                return errorResponse($e, 'Something went wrong sending verification email. Please try again later.', ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
            }
//            else {
//                $otpController = new OTPVerificationController();
//                $otpController->send_code($user);
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

    public function createEmployee(): void
    {
        $user = new User($this->request->safe()->except(['company_name', 'company_type']));
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
        $this->company = new Company($this->request->safe()->only(['name', 'company_type', 'slug']));
        $this->company->save();
    }

}
