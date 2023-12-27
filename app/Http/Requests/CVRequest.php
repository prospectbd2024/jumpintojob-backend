<?php

namespace App\Http\Requests;

use App\Models\Cv;
use Illuminate\Foundation\Http\FormRequest;

class CVRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'template_id' => 'integer|required',
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
        ]);
    }

    public function authorize(): bool
    {
//        return auth()->user()->can('create', Cv::class);
       return true;
    }
}
