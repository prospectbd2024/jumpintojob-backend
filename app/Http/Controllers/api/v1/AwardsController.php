<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AwardsRequest;
use App\Http\Resources\AwardsResource;
use App\Models\Awards;

class AwardsController extends Controller
{
    public function index()
    {
        return AwardsResource::collection(Awards::all());
    }

    public function store(AwardsRequest $request)
    {
        return new AwardsResource(Awards::create($request->validated()));
    }

    public function show(Awards $awards)
    {
        return new AwardsResource($awards);
    }

    public function update(AwardsRequest $request, Awards $awards)
    {
        $awards->update($request->validated());

        return new AwardsResource($awards);
    }

    public function destroy(Awards $awards)
    {
        $awards->delete();

        return response()->json();
    }
}
