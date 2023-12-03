<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required'],
            'award_name' => ['required'],
            'date' => ['required'],
            'description' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
