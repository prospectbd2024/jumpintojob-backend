<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\SearchPreference */
class SearchPreferenceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'preferred_regions' => $this->preferred_regions,
            'preferred_timezone' => $this->preferred_timezone,
            'category_id' => $this->category_id,
            'experience_level' => $this->experience_level,
            'preferred_salary_range' => $this->preferred_salary_range,
            'cv_id' => $this->cv_id,
            'authorized_to_work_in_usa' => $this->authorized_to_work_in_usa,
            'has_employment_work_visa' => $this->has_employment_work_visa,
            'job_notification_confirmed_at' => $this->job_notification_confirmed_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
