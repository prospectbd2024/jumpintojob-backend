<?php

namespace App\Http\Resources\Circular;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class CircularResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'job_title' => $this->title,
            'job_category' => $this->category->category_name, // 'category' is a relationship in 'Circular' model
            'company_name' => $this->employer->company->name,
            'phone' => $this->employer->company->phone,
            'email' => $this->employer->company->email,
            'availability' => $this->availability,
            'image' => $this->employer->company->logo,
            'cover_image' => $this->employer->company->cover_image,
            'description' => $this->description,
            'responsibilities'=> $this->responsibilities,
            'educational_requirements' => $this->educational_requirements,
            'experience' => $this->experience,
            'address' => $this->location,
            'location_type' => $this->location_type,
            'job_vacancy' => $this->vacancies,
            'job_type' => $this->employment_type,
            'salary' => $this->salary,
            'deadline' => $this->deadline,
            'created_at' => $this->formatCreatedAt($this->created_at),
            'links' => [
                'show' => $this->unless(Route::currentRouteName() === 'circular.show', function () {
                    return route('circular.show', [
                        'company' => $this->employer->company->name,
                        'slug' => $this->slug
                    ]);
                }),
                'update' => route('circular.update', ['circular' => $this->id]),
                'delete' => route('circular.destroy', ['circular' => $this->id]),
                'dashboard' =>  "/companies/{$this->employer->company->slug}"
            ],
            
        ];
    }
	 private function formatCreatedAt($created_at): string
     {
        $createdAt = Carbon::parse($created_at);
        $now = Carbon::now();

        $daysDiff = $createdAt->diffInDays($now);

        if ($daysDiff === 0) {
            return 'posted: Today';
        } elseif ($daysDiff === 1) {
            return 'posted: Yesterday';
        } else {
            return 'posted: ' . $daysDiff . ' days ago';
        }
    }
}
