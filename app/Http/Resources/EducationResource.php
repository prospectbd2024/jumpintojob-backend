<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Education */
class EducationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cv_id' => $this->cv_id,
            'institution' => $this->institution,
            'degree' => $this->degree,
            'field_of_study' => $this->field_of_study,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
            'undergraduate' => $this->undergraduate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
