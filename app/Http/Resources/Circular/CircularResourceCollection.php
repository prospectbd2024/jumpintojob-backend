<?php
namespace App\Http\Resources\Circular;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CircularResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        $serial = 1;
        return [
            'data' => CircularResource::collection($this->collection),
        ];
    }
}
