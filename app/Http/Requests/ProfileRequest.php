<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'avatar' => ['nullable', 'image', 'max:2048'],
            'country' => ['nullable'],
            'state' => ['nullable'],
            'city' => ['nullable'],
            'postal_code' => ['nullable'],
            'phone' => ['nullable'],
        ];
    }

//    protected function prepareForValidation(): void
//    {
//        $image = $this->file('avatar');
//
//        if ($image) {
//            // Get the original file name
//            $originalName = $image->getClientOriginalName();
//
//            // Store the file with its original name in the 'profile_images' folder
//            $path = $image->storeAs('profile_images', $originalName, 'public');
//            $this->merge(['avatar' => $path]); // Store the path in the request data
//        }
//    }

    public function authorize(): bool
    {
        return true;
    }
}
