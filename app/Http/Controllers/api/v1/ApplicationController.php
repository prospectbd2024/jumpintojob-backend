<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ApplicationStoreRequest;
use App\Http\Requests\Application\ApplicationUpdateRequest;
use App\Http\Resources\Application\ApplicationResource;
use App\Http\Resources\Application\ApplicationResourceCollection;
use App\Models\Application;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return ApplicationResourceCollection::make((Application::get()));
    }

    // Store a newly created resource in storage.
    public function store(ApplicationStoreRequest $request)
    {
        return ApplicationResource::make(Application::create($request->validated()));
    }

    // Display the specified resource.
    public function show($slug)
    {
        $application = Application::where('slug', $slug)->firstOrFail();
        return ApplicationResource::make($application);
    }

    // Update the specified resource in storage.
    public function update(ApplicationUpdateRequest $request, Application $application)
    {
        $application->update($request->validated());
        return ApplicationResource::make($application);
    }

    // Remove the specified resource from storage.
    public function destroy(Application $application)
    {
        $application->delete();

        return response()->json([
        'success' => true,
        'message' => 'Application deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
