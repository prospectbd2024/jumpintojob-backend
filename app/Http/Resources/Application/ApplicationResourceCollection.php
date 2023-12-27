<?php
namespace App\Http\Resources\Application;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApplicationResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => ApplicationResource::collection($this->collection),
        ];
    }
}
        