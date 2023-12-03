<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use function Symfony\Component\String\s;

class EmployeeSignupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'name' => ['required', Rule::unique('companies')],
            'slug' => ['required', Rule::unique('companies')],
            'company_type' => 'required',
            'password' => [
                'required',
                Password::defaults(),
                'confirmed'],
            'user_type' => [
                'nullable',
                Rule::in(['employer']),
            ],
            'email' => ['required', 'email', Rule::unique('users')],
            'verification_code' => 'nullable',
            'user_plan_id' => 'nullable',
            'new_email_verification_code' => 'nullable',
            'referral_code' => 'nullable',
            'g-recaptcha-response' => [
                Rule::when(get_setting('google_recaptcha') == 1, ['required', new Recaptcha()], ['sometimes'])
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_type' => 'employer',
            'verification_code' => rand(100000, 999999),
            'user_plan_id' => 1,
            'slug' => Str::slug($this->input('name')),
        ]);
    }

    public function messages(): array
    {
        return [
            'company_name.required' => 'Company name is required',
            'company_type.required' => 'Company type is required',
            'slug.unique' => 'Company name is taken',
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
