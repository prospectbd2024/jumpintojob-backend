<?php
namespace App\Http\Resources\Circular;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CircularResourceCollection extends ResourceCollection
{
    public function toArray(Request $request) : ResourceCollection
    {
        $serial = 1;
        return CircularResource::collection($this->collection);
    }
}
