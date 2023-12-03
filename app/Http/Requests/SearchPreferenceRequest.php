<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPreferenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'preferred_regions' => ['nullable'],
            'preferred_timezone' => ['nullable'],
            'category_id' => ['nullable', 'integer'],
            'experience_level' => ['nullable'],
            'preferred_salary_range' => ['nullable'],
            'cv_id' => ['nullable'],
            'authorized_to_work_in_usa' => ['nullable'],
            'has_employment_work_visa' => ['nullable'],
            'job_notification_confirmed_at' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
