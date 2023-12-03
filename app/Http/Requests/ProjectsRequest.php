<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'project_name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'description' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
