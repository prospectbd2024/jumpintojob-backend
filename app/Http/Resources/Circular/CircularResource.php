<?php

namespace App\Http\Resources\Circular;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CircularResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'current_company_name' => $this->current_company_name,
            'location' => $this->location,
            'location_type' => $this->location_type,
            'vacancies' => $this->vacancies,
            'employment_type' => $this->employment_type,
            'salary' => $this->salary,
            'experience_level' => $this->experience_level,
            'deadline' => $this->deadline,
            'is_remote' => $this->is_remote,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'links' => [
                'show' => route('circular.show', ['company' => $this->current_company_name, 'slug' => $this->slug]),
                'update' => route('circular.update', ['circular' => $this->id]),
                'delete' => route('circular.destroy', ['circular' => $this->id]),
            ]
        ];
    }
}
