<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'institution' => ['required'],
            'degree' => ['required'],
            'field_of_study' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['nullable'],
            'description' => ['nullable'],
            'undergraduate' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
