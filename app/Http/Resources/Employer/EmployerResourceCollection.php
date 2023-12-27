<?php
namespace App\Http\Resources\Employer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployerResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => EmployerResource::collection($this->collection),
        ];
    }
}
        