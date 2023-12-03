<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'organization' => ['required'],
            'position' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['nullable'],
            'description' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
