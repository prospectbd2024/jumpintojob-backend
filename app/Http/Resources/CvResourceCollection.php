<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\CV */
class CvResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => new CVResource($this->collection),
        ];
    }
}
