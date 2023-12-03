<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CvUpdateFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'cv_link' => 'nullable',
            'title' => 'required',
            'summary' => 'required',
        ];
    }
    protected function prepareForValidation(): void
    {
        $user = auth()->user();
        $this->merge([
            'user_id' => auth()->id(),
            'cv_link' => 'cv/'.$user->first_name.$user->last_name,
            'title' => $this->input('title'),
            'summary' => $this->input('summary')
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
