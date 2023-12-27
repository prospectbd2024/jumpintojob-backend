<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'address' => ['required'],
            'address_type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
