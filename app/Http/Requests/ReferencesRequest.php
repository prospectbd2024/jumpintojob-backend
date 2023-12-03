<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReferencesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'name' => ['required'],
            'position' => ['required'],
            'company' => ['required'],
            'email' => ['nullable', 'email', 'max:254'],
            'phone' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
