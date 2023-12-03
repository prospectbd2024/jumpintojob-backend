<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillsRequest;
use App\Http\Resources\SkillsResource;
use App\Models\Skills;

class SkillsController extends Controller
{
    public function index()
    {
        return SkillsResource::collection(Skills::all());
    }

    public function store(SkillsRequest $request)
    {
        return new SkillsResource(Skills::create($request->validated()));
    }

    public function show(Skills $skills)
    {
        return new SkillsResource($skills);
    }

    public function update(SkillsRequest $request, Skills $skills)
    {
        $skills->update($request->validated());

        return new SkillsResource($skills);
    }

    public function destroy(Skills $skills)
    {
        $skills->delete();

        return response()->json();
    }
}
