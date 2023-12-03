<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectsRequest;
use App\Http\Resources\ProjectsResource;
use App\Models\Projects;

class ProjectsController extends Controller
{
    public function index()
    {
        return ProjectsResource::collection(Projects::all());
    }

    public function store(ProjectsRequest $request)
    {
        return new ProjectsResource(Projects::create($request->validated()));
    }

    public function show(Projects $projects)
    {
        return new ProjectsResource($projects);
    }

    public function update(ProjectsRequest $request, Projects $projects)
    {
        $projects->update($request->validated());

        return new ProjectsResource($projects);
    }

    public function destroy(Projects $projects)
    {
        $projects->delete();

        return response()->json();
    }
}
