<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterestsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'interest_name' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
