<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'avatar' => ['nullable', 'image', 'max:4048'], // Add other validation rules here
            'country' => ['nullable'],
            'state' => ['nullable'],
            'street' => ['nullable'],
            'city' => ['nullable'],
            'postal_code' => ['nullable'],
            'phone' => ['nullable'],
            'address_id' => ['nullable'],
            'banned' => ['nullable'],
            'customer_package_id' => ['nullable'],
            'ip' => ['nullable'],
            'iso_code' => ['nullable'],
            'zip_code' => ['nullable'],
            'lat' => ['nullable'],
            'lon' => ['nullable'],
            'timezone' => ['nullable'],
            'currency' => ['nullable']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
