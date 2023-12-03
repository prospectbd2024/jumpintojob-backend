<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteerExperienceRequest;
use App\Http\Resources\VolunteerExperienceResource;
use App\Models\VolunteerExperience;

class VolunteerExperienceController extends Controller
{
    public function index()
    {
        return VolunteerExperienceResource::collection(VolunteerExperience::all());
    }

    public function store(VolunteerExperienceRequest $request)
    {
        return new VolunteerExperienceResource(VolunteerExperience::create($request->validated()));
    }

    public function show(VolunteerExperience $volunteerExperience)
    {
        return new VolunteerExperienceResource($volunteerExperience);
    }

    public function update(VolunteerExperienceRequest $request, VolunteerExperience $volunteerExperience)
    {
        $volunteerExperience->update($request->validated());

        return new VolunteerExperienceResource($volunteerExperience);
    }

    public function destroy(VolunteerExperience $volunteerExperience)
    {
        $volunteerExperience->delete();

        return response()->json();
    }
}
