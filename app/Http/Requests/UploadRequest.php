<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file_original_name' => ['nullable'],
            'file_name' => ['nullable'],
            'user_id' => ['nullable', 'integer'],
            'file_size' => ['nullable', 'integer'],
            'extension' => ['nullable'],
            'type' => ['nullable'],
            'external_link' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
