<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'skill_name' => ['required'],
            'category_id' => ['required', 'integer'],
            'proficiency' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
