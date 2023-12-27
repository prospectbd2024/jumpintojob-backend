<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificationsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cv_id' => ['required'],
            'certification_name' => ['required'],
            'authority' => ['required'],
            'license_number' => ['required', 'integer'],
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
