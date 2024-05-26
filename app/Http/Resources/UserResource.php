<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array

    {
        return [
            'user_id' => $this->id,
            'user_plan' => $this->userPlan->name,
            'avatar' => $this->avatar? asset($this->avatar):null,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'position' => $this->position,
            'user_type' => $this->user_type,
            'email' => $this->email,
            'phone' => $this->phone,
            'device_token' => $this->device_token,
            'referral_code' => $this->referral_code,
            'is_verified' =>  $this->is_verified,
            'banned' => $this->banned,
            'regions' => $this->regions,
            'ip' => $this->ip,
            'country' => $this->country,
            'city' => $this->city,
            'state' => $this->state,
            'street'    => $this->street,
            'state_name' => $this->state_name,
            'iso_code' => $this->iso_code,
            'postal_code' => $this->postal_code,
            'zip_code' => $this->zip_code,
            'timezone' => $this->timezone,
            'continent' => $this->continent,
            'currency' => $this->currency,
            'created_at' => diffForHumans($this->created_at, 'jS F Y \a\t h:i A'),
            'updated_at' => diffForHumans($this->updated_at, 'jS F Y \a\t h:i A'),
            'addresses' => AddressResource::collection($this->addresses)

        ];
    }
}
