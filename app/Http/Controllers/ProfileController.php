<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use MongoDB\Laravel\Eloquent\Casts\ObjectId;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return (new Profile)->where('user_id', auth()->id())->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public static function create($profileResource,$user_id): JsonResponse
    {

        // Create a new resume document
        $profile = new Profile();
        $profile->user_id = $user_id;
        $profile->payload = $profileResource;
        $profile->save();

        return response()->json(['message' => 'profile document stored successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show($userId): Collection|array|Profile|null
    {
        return Profile::where('user_id', auth()->id())->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, $id): JsonResponse
    {
        // Validate request
        $request->validate([
            'payload' => 'required|array'
        ]);

        // Create a new resume document
        $resume = (new Profile)->findOrFail($id);
        $resume->payload = $request->payload;
        $resume->save();
        return response()->json(['message' => 'profile document updated successfully']);
    }
}
