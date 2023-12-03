<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Education */
class EducationResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => new EducationResource($this->collection),
        ];
    }
}
