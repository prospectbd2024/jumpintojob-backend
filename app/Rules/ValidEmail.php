<?php

namespace App\Rules;

use Closure;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Password;

class ValidEmail implements ValidationRule
{
    public function passes($attribute, $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
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
