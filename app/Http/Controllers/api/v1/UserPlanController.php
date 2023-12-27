<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPlanRequest;
use App\Http\Resources\UserPlanResource;
use App\Models\UserPlan;

class UserPlanController extends Controller
{
    public function index()
    {
        return UserPlanResource::collection(UserPlan::all());
    }

    public function store(UserPlanRequest $request)
    {
        return new UserPlanResource(UserPlan::create($request->validated()));
    }

    public function show(UserPlan $userPlan)
    {
        return new UserPlanResource($userPlan);
    }

    public function update(UserPlanRequest $request, UserPlan $userPlan)
    {
        $userPlan->update($request->validated());

        return new UserPlanResource($userPlan);
    }

    public function destroy(UserPlan $userPlan)
    {
        $userPlan->delete();

        return response()->json();
    }
}
