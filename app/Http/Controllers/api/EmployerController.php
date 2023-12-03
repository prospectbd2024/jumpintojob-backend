<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employer\EmployerStoreRequest;
use App\Http\Requests\Employer\EmployerUpdateRequest;
use App\Http\Resources\Employer\EmployerResource;
use App\Http\Resources\Employer\EmployerResourceCollection;
use App\Models\Employer;
use Symfony\Component\HttpFoundation\Response;

class EmployerController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return EmployerResourceCollection::make((Employer::get()));
    }

    // Store a newly created resource in storage.
    public function store(EmployerStoreRequest $request)
    {
        return EmployerResource::make(Employer::create($request->validated()));
    }

    // Display the specified resource.
    public function show(Employer $employer)
    {
        return EmployerResource::make($employer);
    }

    // Update the specified resource in storage.
    public function update(EmployerUpdateRequest $request, Employer $employer)
    {
        $employer->update($request->validated());
        return EmployerResource::make($employer);
    }

    // Remove the specified resource from storage.
    public function destroy(Employer $employer)
    {
        $employer->delete();

        return response()->json([
        'success' => true,
        'message' => 'Employer deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
