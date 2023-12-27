<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Http\Resources\CoursesResource;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
        return CoursesResource::collection(Course::all());
    }

    public function store(CoursesRequest $request)
    {
        return new CoursesResource(Course::create($request->validated()));
    }

    public function show(Course $courses)
    {
        return new CoursesResource($courses);
    }

    public function update(CoursesRequest $request, Course $courses)
    {
        $courses->update($request->validated());

        return new CoursesResource($courses);
    }

    public function destroy(Course $courses)
    {
        $courses->delete();

        return response()->json();
    }
}
