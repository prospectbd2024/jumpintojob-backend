<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
//use App\Http\Controllers\api\v1\OTPVerificationController;
//use App\Models\BusinessSetting;
//use App\Models\Cart;
//use App\Models\Candidate;
use App\Http\Controllers\api\v1\OTPVerificationController;
use App\Http\Requests\EmployeeSignupRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\UserResource;
use App\Models\BusinessSetting;
use App\Models\User;
use App\Notifications\NewUserEmailVerificationNotification;
use App\Rules\Recaptcha;

//use App\Services\SocialRevoke;
use App\Services\AuthService;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * new user sign up endpoint
     * params: first_name, last_name, email, password, password_confirmation, register_by, g-recaptcha-response
     * @param SignupRequest $request
     * @return JsonResponse
     */
    public function jobSeekerSignup(SignupRequest $request)
    {
        $this->authService->setRequest($request);
        $this->authService->createJobSeeker();
        $this->authService->createAddress();
        $this->sendVerificationCode('email', $this->authService->getUser());


        // Create token
        $token = $this->authService->getUser()->createToken('tokens');

        return response()->json([
            'result' => true,
            'message' => (get_setting('email_verification') === null) ?
                'Registration Successful! Please verify to use all features or log in to your account.' :
                'Registration Successful! Please log in to your account.',
            'is_verified' => (get_setting('email_verification') === null) ? false : true,
            'user_id' => $this->authService->getUser()->id,
            'access_token' => $token->plainTextToken,
        ], 200);
    }


    /**
     * new user sign up endpoint
     * params: first_name, last_name, email, password, password_confirmation, register_by, g-recaptcha-response
     * @return JsonResponse
     */
    public function employerSignup(EmployeeSignupRequest $request)
    {
        $this->authService->setRequest($request);
        $this->authService->createCompany();
        $this->authService->createEmployer();
        $this->authService->createAddress();
        // $this->sendVerificationCode('email');


        // Create token
        $token = $this->authService->getUser()->createToken('tokens');

        return response()->json([
            'result' => true,
            'message' => get_setting('email_verification') == '1' ?
                'Registration Successful! Please verify your email to use all features and log in to your account.' :
                'Registration Successful! Please log in to your account.',
            'access_token' => $token->plainTextToken,
        ], 200);
    }

    /**
     * user email verification resend endpoint
     * params: user_id, verify_by (email or phone)
     * @param Request $request
     * @return JsonResponse
     */
    public function resendCode(Request $request)
    {
        try {
            $request->validate([
                'verify_by' => 'nullable|in:email,phone',
                'email_or_phone' => 'nullable',
            ]);


            $user = $this->getUserForVerification($request);

            if ($this->needsVerification($user)) {
                return $this->alreadyVerifiedResponse();
            }

            $user->generateVerificationCode();

            $this->sendVerificationCode($request->verify_by, $user);

            return $this->verificationCodeSentResponse();
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    public function needsVerification($user): bool
    {
        return $user->verification_code == null;
    }

    protected function getUserForVerification(Request $request)
    {
        if ($request->verify_by == null) {
            return auth()->user();
        }
        if ($request->verify_by == 'email') {
            return User::where('email', $request->email_or_phone)->first();
        }

        return User::where('phone', $request->email_or_phone)->first();
    }

    protected function alreadyVerifiedResponse()
    {
        return response()->json([
            'result' => false,
            'message' => translate('You are already verified'),
        ], 200);
    }

    protected function verificationCodeSentResponse()
    {
        return response()->json([
            'result' => true,
            'message' => translate('A code has been sent again'),
        ], 200);
    }

    public function sendVerificationCode($method, User $user): void
    {
        if ($method == 'email') {
            // Send the verification code via email
            $user->notify(new NewUserEmailVerificationNotification());
            // the email was sent on another process
        } else {
            $otpController = new OTPVerificationController();
            $otpController->send_code($this->authService->getUser());
        }
    }

    protected function errorResponse($message)
    {
        return response()->json([
            'result' => false,
            'message' => $message,
        ], 400);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function confirmCode(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::where('id', $user_id)->first();

        if ($user->verification_code == $request->verification_code) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->verification_code = null;
            $user->is_verified = true;
            $user->save();
            return response()->json([
                'result' => true,
                'message' => 'Your account is now verified.Please login',
            ], 200);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Code does not match, you can request for resending the code',
            ], 200);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function accountVerification(Request $request, $user_id, $code)
    {
        $user = User::where('id', $user_id)->orWhere('verification_code', $code)->firstOrFail();

        if (!$user->email_verified_at) {
            $user->update([
                'email_verified_at' => now(),
                'verification_code' => null,
            ]);

            AuthService::sendWelcomeEmailToUser($user);
            // return response()->json(['message' => 'Account verified successfully']);
            return redirect(config('app.APP_FRONTEND'));
        }

        return response()->json(['message' => 'Account already verified']);
    }

    /**
     * fields required: email, password, remember_me
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
            'remember_me' => 'boolean'
        ]);


        $user = User::where('email', $request->email)->first();

        if ($user != null) {
            if (!$user->banned) {
                if (Hash::check(request()->password, $user->password)) {

                    //                    if ($user->email_verified_at == null) {
                    //                        return response()->json(['result' => false, 'message' => 'Please verify your account', 'user' => null], 401);
                    //                    }
                    return new LoginResource($user);
                } else {
                    return response()->json(['result' => false, 'message' => 'Unauthorized', 'user' => null], 401);
                }
            } else {
                return response()->json(['result' => false, 'message' => 'User is banned', 'user' => null], 401);
            }
        } else {
            return response()->json(['result' => false, 'message' => 'User not found', 'user' => null], 401);
        }
    }

    /**
     * @return UserResource
     */
    public function user()
    {
        return new UserResource(cache()->remember('user_' . auth()->id(), 86400, function () {
            return auth()->user();
        }));
    }

    public function isBanned()
    {
        if (auth()->user()->banned) {
            return errorResponse('banned', 'User is banned', Response::HTTP_LOCKED);
        }
        return successResponse(false, 'User is not banned', Response::HTTP_OK);
    }

    public function isVerified()
    {
        if (auth()->user()->email_verified_at) {
            return successResponse(true, 'User is verified', Response::HTTP_OK);
        }
        return errorResponse('verified', 'User is not verified', Response::HTTP_LOCKED);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {

        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'result' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function socialLogin(Request $request)
    {
        if (!$request->provider) {
            return response()->json([
                'result' => false,
                'message' => 'User not found',
                'user' => null
            ]);
        }

        switch ($request->social_provider) {
            case 'facebook':
                $social_user = Socialite::driver('facebook')->fields([
                    'name',
                    'first_name',
                    'last_name',
                    'email'
                ]);
                break;
            case 'google':
                $social_user = Socialite::driver('google')
                    ->scopes(['profile', 'email']);
                break;
            case 'twitter':
                $social_user = Socialite::driver('twitter');
                break;
            case 'apple':
                $social_user = Socialite::driver('sign-in-with-apple')
                    ->scopes(['name', 'email']);
                break;
            default:
                $social_user = null;
        }
        if ($social_user == null) {
            return response()->json(['result' => false, 'message' => 'No social provider matches', 'user' => null]);
        }

        if ($request->social_provider == 'twitter') {
            $social_user_details = $social_user->userFromTokenAndSecret($request->access_token, $request->secret_token);
        } else {
            $social_user_details = $social_user->userFromToken($request->access_token);
        }

        if ($social_user_details == null) {
            return response()->json(['result' => false, 'message' => 'No social account matches', 'user' => null]);
        }

        $existingUserByProviderId = User::where('provider_id', $request->provider)->first();

        if ($existingUserByProviderId) {
            $existingUserByProviderId->access_token = $social_user_details->token;
            if ($request->social_provider == 'apple') {
                $existingUserByProviderId->refresh_token = $social_user_details->refreshToken;
                if (!isset($social_user->User['is_private_email'])) {
                    $existingUserByProviderId->email = $social_user_details->email;
                }
            }
            $existingUserByProviderId->save();
            return $this->loginSuccess($existingUserByProviderId);
        } else {
            $existing_or_new_user = User::firstOrNew(
                [['email', '!=', null], 'email' => $social_user_details->email]
            );

            $existing_or_new_user->user_type = 'Candidate';
            $existing_or_new_user->provider_id = $social_user_details->id;

            if (!$existing_or_new_user->exists) {
                if ($request->social_provider == 'apple') {
                    if ($request->name) {
                        $existing_or_new_user->name = $request->name;
                    } else {
                        $existing_or_new_user->name = 'Apple User';
                    }
                } else {
                    $existing_or_new_user->name = $social_user_details->name;
                }
                $existing_or_new_user->email = $social_user_details->email;
                $existing_or_new_user->email_verified_at = date('Y-m-d H:m:s');
            }

            $existing_or_new_user->save();

            return $this->loginSuccess($existing_or_new_user);
        }
    }

    /**
     * @param $user
     * @return LoginResource
     */
    protected function loginSuccess($user)
    {
        return new LoginResource($user);
    }


    /**
     * @return JsonResponse
     */
    public function account_deletion()
    {
        if (auth()->user()) {
            //            Cart::where('user_id', auth()->user()->id)->delete();
        }

        // if (auth()->user()->provider && auth()->user()->provider != 'apple') {
        //     $social_revoke =  new SocialRevoke;
        //     $revoke_output = $social_revoke->apply(auth()->user()->provider);

        //     if ($revoke_output) {
        //     }
        // }

        $auth_user = auth()->user();
        $auth_user->tokens()->where('id', $auth_user->currentAccessToken()->id)->delete();
        $auth_user->Candidate_products()->delete();

        User::destroy(auth()->user()->id);

        return response()->json([
            "result" => true,
            "message" => 'Your account deletion successfully done'
        ]);
    }
    public function socialSignIn(Request $request)
    {
        $userInfo = $request->userInfo['user'];
        $profile = $request->userInfo['profile'];
        $account = $request->userInfo['account'];
        $user_type = $request->userInfo['user_type'];
        if (!$userInfo) {
            return response()->json(['result' => false, 'message' => 'User Not Found', 'user' => null]);
        }
        $user_profile = (object)  $userInfo;
        $user = User::where('email', $user_profile->email)->first();
        if ($user) {
            $login_resource =  new LoginResource($user);
            return   $login_resource;
        }
        $user = new User;
        $user->user_plan_id = 1;
        $user->first_name = $user_profile->name;
        $user->last_name = "";
        $user->email = $user_profile->email;
        $user->avatar = $user_profile->image;
        $user->is_verified = 1;
        $user->password = Str::random(10);
        $user->user_type =  $user_type;
        $user->social_profile = json_encode($profile);
        $user->social_account = json_encode($account);
        $user->save();
        $user->createToken('tokens');
        $login_resource =  new LoginResource($user);
        return $login_resource;
    }
}
