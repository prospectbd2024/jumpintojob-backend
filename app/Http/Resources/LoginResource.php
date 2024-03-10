<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'result' => true,
            'message' => ($this->resource->email_verified_at == null) ? ', Please verify your email address to use all features!' : 'Successfully logged in',
            'token_type' => 'Bearer',
            'is_verified' => $this->resource->is_verified,
            'expires_at' => now()->addMinutes(config('sanctum.expiration'))->toDateTimeString(), // Add this line,
            'access_token' => $this->resource->createToken('API Token')->plainTextToken,
            'user_type' => $this->resource->user_type,
            'user' => new UserResource($this->resource)
        ];
    }
}
