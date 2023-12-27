<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\OTPVerificationController;
use App\Models\User;
use App\Notifications\api\v1\AppEmailVerificationNotification;
use Hash;
use Illuminate\Http\Request;

//use App\Http\Controllers\api\v1\OTPVerificationController;

class PasswordResetController extends Controller
{
    public function forgetRequest(Request $request)
    {
        if ($request->send_code_by == 'email') {
            $user = User::where('email', $request->email_or_phone)->first();
        } else if ($request->send_code_by == 'phone') {
            $user = User::where('phone', $request->email_or_phone)->first();
        }


        if (!$user) {
            return response()->json([
                'result' => false,
                'message' => translate('User is not found')], 404);
        }

        if ($user) {
            $user->verification_code = rand(100000, 999999);
            $user->save();
            if ($request->send_code_by == 'phone') {

//                $otpController = new OTPVerificationController();
//                $otpController->send_code($user);
            } else {
                $user->notify(new AppEmailVerificationNotification());
            }
        }

        return response()->json([
            'result' => true,
            'message' => translate('A code is sent')
        ], 200);
    }

    public function confirmReset(Request $request)
    {
        $user = User::where('verification_code', $request->verification_code)->first();

        if ($user != null) {
            $user->verification_code = null;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'result' => true,
                'message' => translate('Your password is reset.Please login'),
            ], 200);
        } else {
            return response()->json([
                'result' => false,
                'message' => translate('No user is found'),
            ], 200);
        }
    }

    public function resendCode(Request $request)
    {
        try {
            $request->validate([
                'verify_by' => 'nullable|in:email,phone',
                'email_or_phone' => 'nullable',
            ]);

            $user = $this->getUserForVerification($request);

            if (!$user->needsVerification()) {
                return $this->alreadyVerifiedResponse();
            }

            $user->generateVerificationCode();

            $this->sendVerificationCode($request->verify_by, $user);

            return $this->verificationCodeSentResponse();
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    protected function getUserForVerification(Request $request)
    {
        if (!$request->verify_by) {
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

    public function sendVerificationCode($method, $user): void
    {
        if ($method == 'email') {
            // Send the verification code via email
            $user->notify(new AppEmailVerificationNotification());
        } else {
            $otpController = new OTPVerificationController();
            $otpController->send_code($user);
        }
    }

    protected function errorResponse($message)
    {
        return response()->json([
            'result' => false,
            'message' => $message,
        ], 400);
    }
}
