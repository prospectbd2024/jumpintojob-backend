<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_name' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
