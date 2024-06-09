<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Profile;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use MongoDB\Laravel\Eloquent\Casts\ObjectId;
use MongoDB\Laravel\Eloquent\Model;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($userId): Model|JsonResponse|Profile
    {
        if(auth()->id() !== (int) $userId){
            return response()->json([
                'status' => false,
                'message' => 'User does not have permission'
            ]);
        }
    
        $profile = Profile::where('user_id', (int) $userId)->firstOrFail();
    
        return $profile;
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

        // Create a new Profile document
        $profile = (new Profile)->where('user_id',(int) $id)->firstOrFail();
        $profile->payload = $request->payload;
        $profile->save();
        return response()->json(['message' => 'profile document updated successfully']);
    }
        /**
     * Display the specified resource.
     */
    public function showResume($userId) 
    {
        if(auth()->id() !== (int) $userId){
            return response()->json([
                'status' => false,
                'message' => 'User does not have permission'
            ]);
        }
    
        $cv = CV::where('user_id',$userId)->firstOrFail();
        if (!$cv){
            return  response()->json([
                'status' => false,
                'message' => 'CV not found',
                
            ]);
        }
        return  response()->json([
        'status' => true,
        'data' => $cv->cv_html,
         ]);
 
    }
}
