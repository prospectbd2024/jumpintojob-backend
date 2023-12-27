<?php
namespace App\Http\Resources\CandidateContact;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CandidateContactResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => CandidateContactResource::collection($this->collection),
        ];
    }
}
        