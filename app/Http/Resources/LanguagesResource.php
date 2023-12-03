<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Languages */
class LanguagesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cv_id' => $this->cv_id,
            'language_name' => $this->language_name,
            'proficiency' => $this->proficiency,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
