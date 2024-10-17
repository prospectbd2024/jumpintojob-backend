<?php

namespace App\Http\Resources;

use App\Http\Resources\Circular\CircularResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cv_id' => $this->cv_id,
            'job' => CircularResource::make($this->circular),
            'forwarding_letter' => $this->forwarding_letter,
            'forwarding_letter_type' => $this->forwarding_letter_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
