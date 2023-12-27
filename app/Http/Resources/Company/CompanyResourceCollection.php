<?php
namespace App\Http\Resources\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => CompanyResource::collection($this->collection),
        ];
    }
}
        