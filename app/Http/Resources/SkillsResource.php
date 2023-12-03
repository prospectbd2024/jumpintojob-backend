<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Skills */
class SkillsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cv_id' => $this->cv_id,
            'skill_name' => $this->skill_name,
            'category_id' => $this->category_id,
            'proficiency' => $this->proficiency,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
