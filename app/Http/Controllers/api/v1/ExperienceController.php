<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        return ExperienceResource::collection(Experience::all());
    }

    public function store(ExperienceRequest $request)
    {
        return new ExperienceResource(Experience::create($request->validated()));
    }

    public function show(Experience $experience)
    {
        return new ExperienceResource($experience);
    }

    public function update(ExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->validated());

        return new ExperienceResource($experience);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return response()->json();
    }
}
