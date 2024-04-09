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
            'language' => $this->language
        ];
    }
}
