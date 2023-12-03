<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Upload */
class UploadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'file_original_name' => $this->file_original_name,
            'file_name' => $this->file_name,
            'user_id' => $this->user_id,
            'file_size' => $this->file_size,
            'extension' => $this->extension,
            'type' => $this->type,
            'external_link' => $this->external_link,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
