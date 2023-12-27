<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUseTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
