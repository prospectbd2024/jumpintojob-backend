<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        return EducationResource::collection(Education::all());
    }

    public function addEducation(EducationRequest $request)
    {
        return new EducationResource(Education::create($request->validated()));
    }

    public function getEducation(Education $education)
    {
        return new EducationResource($education);
    }

    public function updateEducation(EducationRequest $request, Education $education)
    {
        $education->update($request->validated());

        return new EducationResource($education);
    }

    public function deleteEducation(Education $education)
    {
        $education->delete();

        return response()->json();
    }
}
