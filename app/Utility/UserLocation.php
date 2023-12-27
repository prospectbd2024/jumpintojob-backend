<?php

namespace App\Utility;

use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserLocation
{
    public function __construct(Request $request, User $user)
    {
        $ip = $request->ip();
        $location = geoip($ip);

        // Store the location data in your database if needed
        
        $user->update([
            'ip' => $ip,
            'user_id' => id,
            'iso_code' => $location->iso_code,
            'country' => $location->country,
            'city' => $location->city,
            'state' => $location->state,
            'state_name' => $location->state_name,
            'postal_code' => $location->postal_code,
            'lat' => $location->lat,
            'lon' => $location->lon,
            'timezone' => $location->timezone,
            'continent' => $location->continent,
            'currency' => $location->currency
            // Add more fields as needed
        ]);

        return response()->json(['message' => 'Location retrieved and stored successfully']);
    }
}


