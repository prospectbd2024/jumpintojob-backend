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
            'name' => $this->name,
        ];
    }
}
