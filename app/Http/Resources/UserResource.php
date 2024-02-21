<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_type' => $this->user_type,
            'email' => $this->email,
            'phone' => $this->email,
            'device_token' => $this->device_token,
            'referral_code' => $this->referral_code,
            'user_plan_id' => $this->user_plan_id,
            'cv' => new CVResource($this->cv),
            'address' => new AddressResource($this->address),
            'is_verified' =>  $this->is_verified

        ];
    }
}
