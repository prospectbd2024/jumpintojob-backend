<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Circular\CircularStoreRequest;
use App\Http\Requests\Circular\CircularUpdateRequest;
use App\Http\Resources\Circular\CircularResource;
use App\Http\Resources\Circular\CircularResourceCollection;
use App\Models\Circular;
use Symfony\Component\HttpFoundation\Response;

class CircularController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return CircularResourceCollection::make(Circular::latest()->paginate());
    }

    // Store a newly created resource in storage.
    public function store(CircularStoreRequest $request)
    {
        return CircularResource::make(Circular::create($request->validated()));
    }

    // Display the specified resource.
    public function show($company, $slug)
    {
        $circular = Circular::where('slug', $slug)
            ->where('current_company_name', $company)
            ->firstOrFail();
        return CircularResource::make($circular);
    }

    // Update the specified resource in storage.
    public function update(CircularUpdateRequest $request, Circular $circular)
    {
        $circular->update($request->validated());
        return CircularResource::make($circular);
    }

    // Remove the specified resource from storage.
    public function destroy(Circular $circular)
    {
        $circular->delete();

        return response()->json([
            'success' => true,
            'message' => 'Circular deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
