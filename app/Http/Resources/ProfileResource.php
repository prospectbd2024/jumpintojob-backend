<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Profile */
class ProfileResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'avatar' => $this->avatar,
            'address_id' => $this->address_id,
            'country' => $this->country,
            'state' => $this->state,
            'street' => $this->street,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'ip' => $this->ip,
            'iso_code' => $this->iso_code,
            'zip_code' => $this->zip_code,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'timezone' => $this->timezone,
            'currency' => $this->currency,
        ];
    }
}
