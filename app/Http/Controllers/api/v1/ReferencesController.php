<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReferencesRequest;
use App\Http\Resources\ReferencesResource;
use App\Models\References;

class ReferencesController extends Controller
{
    public function index()
    {
        return ReferencesResource::collection(References::all());
    }

    public function store(ReferencesRequest $request)
    {
        return new ReferencesResource(References::create($request->validated()));
    }

    public function show(References $references)
    {
        return new ReferencesResource($references);
    }

    public function update(ReferencesRequest $request, References $references)
    {
        $references->update($request->validated());

        return new ReferencesResource($references);
    }

    public function destroy(References $references)
    {
        $references->delete();

        return response()->json();
    }
}
