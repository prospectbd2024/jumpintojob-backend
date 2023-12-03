<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{

    private FileUploadService $fileUploadService;
    private string|int|null $id;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
        $this->id = auth()->id();
    }

    public function updateProfile(ProfileUpdateRequest $request): ProfileResource
    {
        $user = auth()->user();
        $user->fill($request->only(['first_name', 'last_name']));

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $this->fileUploadService->process($avatar, 'profile_images', 'profiles', 'avatar', 'public');
            $user->profile->avatar = $avatarPath; // Update avatar path in profile
        }

        $user->profile->update($request->except('avatar', 'banned'));
        $user->push(); // Save changes to user

        return new ProfileResource($user->profile);
    }


    public function getUserProfile()
    {
        return new ProfileResource(cache()->remember('profile_'.$this->id, 60*60*2, function () {
            return auth()->user()->profile;
        }));
    }

    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $profile->update($request->validated());

        return new ProfileResource(cache()->remember('profile_'.$this->id, 60*60*2, function ($profile) {
            return $profile;
        }));
    }

    public function destroy(Profile $profile)
    {
        $this->authorize('delete', $profile);

        $profile->delete();

        return response()->json();
    }
}
