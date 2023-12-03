<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguagesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required', 'integer'],
            'language_name' => ['required'],
            'proficiency' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
