<?php
namespace App\Http\Resources\Candidate;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CandidateResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => CandidateResource::collection($this->collection),
        ];
    }
}
        