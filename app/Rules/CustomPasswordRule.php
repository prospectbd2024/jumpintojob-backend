<?php

namespace App\Rules;

use Closure;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Password;

class CustomPasswordRule implements ValidationRule
{
    public function passes($attribute, $value)
    {
        return  Password::min(12)
            ->letters()
            ->numbers()
            ->symbols()
            ->mixedCase()
            ->uncompromised()
            ->check($value);
    }

    public function message(): string
    {
        return 'The :attribute must meet the password complexity requirements.';
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
