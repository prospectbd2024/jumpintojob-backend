<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\InterestsRequest;
use App\Http\Resources\InterestsResource;
use App\Models\Interests;

class InterestsController extends Controller
{
    public function index()
    {
        return InterestsResource::collection(Interests::all());
    }

    public function store(InterestsRequest $request)
    {
        return new InterestsResource(Interests::create($request->validated()));
    }

    public function show(Interests $interests)
    {
        return new InterestsResource($interests);
    }

    public function update(InterestsRequest $request, Interests $interests)
    {
        $interests->update($request->validated());

        return new InterestsResource($interests);
    }

    public function destroy(Interests $interests)
    {
        $interests->delete();

        return response()->json();
    }
}
