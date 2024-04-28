<?php

namespace App\Http\Requests\Circular;

use App\Services\FileUploadService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CircularStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Authorization logic goes here (e.g., check if the user has permission)
    }

    protected function prepareForValidation(): void
    {
        // You can perform data manipulation here
        $employer = Auth::user()->employer;
        $this->merge([
            'slug' => ucwords(strtolower($this->input('title'))), // Convert name to title case
            'employer_id' => $employer->id, // Add the authenticated user's employer ID
        ]);
    }

    public function rules(): array
    {
        return [
            'employer_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'availability' => 'required',
            'slug' => 'nullable',
            'current_company_name' => 'nullable',
            'location' => 'required',
            'location_type' => 'required',
            'vacancies' => 'required',
            'employment_type' => 'required',
            'salary' => 'required',
            'deadline' => 'required',
            'created_at' => 'nullable',
            'responsibilities' => 'nullable',
            'educational_requirements' => 'nullable',
            'experience' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Circular title',
            'description' => 'Circular description',
            // 'image' => 'product image',
            // Define custom attribute names for validation error messages here
        ];
    }

    protected function passedValidation(): void
    {
        // You can further manipulate the validated data after it has been inserted into the database
        // For example, you can hash the password before storing it in the database
        $this->replace([
        ]);
    }
}
