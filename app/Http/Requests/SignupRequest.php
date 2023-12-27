<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Propaganistas\LaravelDisposableEmail\Validation\Indisposable;

class SignupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => [
                'required',
                Password::defaults(),
                'confirmed'],
            'user_type' => [
                'nullable',
                Rule::in(['job_seeker']),
            ],
            'email' => [
                'required_if:register_by,email',
                'unique:users,email',
                Rule::unique('users', 'email')
                    ->whereNotNull('deleted_at')
            ],
//            'phone' => [
//                'required_if:register_by,phone',
//                'unique:users,phone',
//                Rule::unique('users', 'phone')
//                    ->whereNotNull('deleted_at')
//            ],
            'verification_code' => 'nullable',
            'user_plan_id' => 'nullable',
            'new_email_verification_code' => 'nullable',
            'referral_code' => 'nullable',

//                Rule::when($this->input('register_by') === 'email', function () {
//                   new Indisposable,
//                        }),

            'g-recaptcha-response' => [
                Rule::when(get_setting('google_recaptcha') == 1, ['required', new Recaptcha()], ['sometimes'])
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_type' => 'job_seeker',
            'verification_code' => rand(100000, 999999),
            'user_plan_id' => 1,
        ]);
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'email_or_phone.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'password.min' => 'Minimum 6 digits required for password'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
