<?php

namespace App\Http\Requests\Circular;

use Illuminate\Foundation\Http\FormRequest;

class CircularStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Authorization logic goes here (e.g., check if the user has permission)
    }

    protected function prepareForValidation(): void
        {
            // You can perform data manipulation here
            $this->merge([
                'slug' => ucwords(strtolower($this->input('title'))), // Convert name to title case
                'employer_id' => auth()->user()->employer->id, // Add the authenticated user's employer ID
                'current_company_name' => auth()->user()->employer->company->name, // Add the authenticated user's company name
                'created_at' => now(),
                // Add more data manipulation as needed
            ]);
        }

    public function rules(): array
    {
        return [
            'employer_id' => 'nullable|integer',
            'category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'slug' => 'nullable',
            'current_company_name' => 'nullable',
            'location' => 'required',
            'location_type' => 'required',
            'vacancies' => 'required',
            'employment_type' => 'required',
            'salary' => 'required',
            'experience_level' => 'required',
            'deadline' => 'required',
            'is_remote' => 'required',
            'created_at' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'location.required' => 'The location field is required.',
            'location_type.required' => 'The location type field is required.',
            'vacancies.required' => 'The vacancies field is required.',
            'employment_type.required' => 'The employment type field is required.',
            'salary.required' => 'The salary field is required.',
            'experience_level.required' => 'The experience level field is required.',
            'deadline.required' => 'The deadline field is required.',
            'is_remote.required' => 'The is remote field is required.',
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
            //
        ]);
    }
}
