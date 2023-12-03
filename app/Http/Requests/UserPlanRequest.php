<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPlanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
