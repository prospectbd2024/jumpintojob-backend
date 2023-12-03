<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationsRequest;
use App\Http\Resources\PublicationsResource;
use App\Models\Publications;

class PublicationsController extends Controller
{
    public function index()
    {
        return PublicationsResource::collection(Publications::all());
    }

    public function store(PublicationsRequest $request)
    {
        return new PublicationsResource(Publications::create($request->validated()));
    }

    public function show(Publications $publications)
    {
        return new PublicationsResource($publications);
    }

    public function update(PublicationsRequest $request, Publications $publications)
    {
        $publications->update($request->validated());

        return new PublicationsResource($publications);
    }

    public function destroy(Publications $publications)
    {
        $publications->delete();

        return response()->json();
    }
}
