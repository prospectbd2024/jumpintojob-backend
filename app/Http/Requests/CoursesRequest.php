<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'course_name' => ['required'],
            'institution' => ['required'],
            'completion_date' => ['required'],
            'description' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
