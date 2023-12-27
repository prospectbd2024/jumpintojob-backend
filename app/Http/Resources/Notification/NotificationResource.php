<?php
namespace App\Http\Resources\Notification;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $id = $this->id;
        return [
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d-m-Y'),
            'links' => [
                'show' => route('notification.show', $this->slug),
                'update' => route('notification.update', $id),
                'delete' => route('notification.destroy', $id),
            ]
        ];
    }
}
        