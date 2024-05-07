<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillsRequest;
use App\Http\Resources\SkillsResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        return SkillsResource::collection(Skill::paginate(10) );
    }

    public function store(SkillsRequest $request)
    {
        return new SkillsResource(Skill::create($request->validated()));
    }

    public function show(Skill $skills)
    {
        return new SkillsResource($skills);
    }

    public function update(SkillsRequest $request, Skill $skills)
    {
        $skills->update($request->validated());

        return new SkillsResource($skills);
    }

    public function destroy(Skill $skills)
    {
        $skills->delete();

        return response()->json();
    }
    public function search($searchKey)
    {
        $skills = Skill::where('name', 'LIKE', '%' . $searchKey . '%')->get();
        return SkillsResource::collection($skills);
    }
}
