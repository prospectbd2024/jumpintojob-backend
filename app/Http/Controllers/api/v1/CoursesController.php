<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Http\Resources\CoursesResource;
use App\Models\Courses;

class CoursesController extends Controller
{
    public function index()
    {
        return CoursesResource::collection(Courses::all());
    }

    public function store(CoursesRequest $request)
    {
        return new CoursesResource(Courses::create($request->validated()));
    }

    public function show(Courses $courses)
    {
        return new CoursesResource($courses);
    }

    public function update(CoursesRequest $request, Courses $courses)
    {
        $courses->update($request->validated());

        return new CoursesResource($courses);
    }

    public function destroy(Courses $courses)
    {
        $courses->delete();

        return response()->json();
    }
}
