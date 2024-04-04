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
        return CircularResourceCollection::make(Circular::with('category', 'employer')->latest()->paginate());
    }

    // Store a newly created resource in storage.
    public function store(CircularStoreRequest $request)
    {
        $data = Circular::create($request->validated());
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Circular created successfully',
                'data' => CircularResource::make($data)
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'success' => false,
            'message' => 'Circular could not be created'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    // Display the specified resource.
    public function getCircular($company, $slug)
    {
        try {
            // Fetch circular
            $circular = Circular::with('category', 'employer')
                ->where('slug', $slug)
                ->firstOrFail();

            // Validate company
            if ($circular->employer->company->name === $company) {
                return CircularResource::make($circular);
            }

            return response()->json([
                'success' => false,
                'message' => 'Circular not found for this company'
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
    public function show($id)
    {
        try {
            // Fetch circular
            $circular = Circular::with('category', 'employer')
                ->where('id', $id)
                ->firstOrFail();

            // Validate company

            return CircularResource::make($circular);

        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
