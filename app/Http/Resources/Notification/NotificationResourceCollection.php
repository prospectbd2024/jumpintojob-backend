<?php
namespace App\Http\Resources\Notification;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => NotificationResource::collection($this->collection),
        ];
    }
}
        