<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Circular\CircularStoreRequest;
use App\Http\Requests\Circular\CircularUpdateRequest;
use App\Http\Resources\Circular\CircularResource;
use App\Http\Resources\Circular\CircularResourceCollection;
use App\Models\Circular;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CircularController extends Controller
{
    // Display a listing of the resource.
    /**
     * Display a listing of the circulars.
     *
     * @return CircularResourceCollection
     */
    public function index(): CircularResourceCollection
    {
        return CircularResourceCollection::make(Circular::with('category', 'employer')->latest()->paginate());
    }
    public function search(Request $request): CircularResourceCollection
{
    // Retrieve the search key and location from the request
    $searchKey = $request->searchKey;
    $location = $request->location ;
    
    // Build the query
    $query = Circular::with('category', 'employer.company');
    
    // Add conditions based on searchKey and location if they are provided
    if ($searchKey) {
        $query->where(function ($query) use ($searchKey) {
            $query->where('title', 'like', '%' . $searchKey . '%')
                  ->orWhereHas('category', function ($query) use ($searchKey) {
                      $query->where('category_name', 'like', '%' . $searchKey . '%');
                  })
                  ->orWhereHas('employer.company', function ($query) use ($searchKey) {
                      $query->where('name', 'like', '%' . $searchKey . '%');
                  })
                  ->orWhere('description', 'like', '%' . $searchKey . '%');
        });
    }
    
    if ($location) {
        $query->where('location', 'like', '%' . $location . '%');
    }
    
    // Execute the query with pagination
    $circulars = $query->latest()->paginate();
    
    // Return the collection
    return CircularResourceCollection::make($circulars);
}

    
    /**
     * Display a listing of the featured circulars.
     *
     * @return CircularResourceCollection
     */
    public function featuredCircular(): CircularResourceCollection
    {
        return CircularResourceCollection::make(
            Circular::with('category', 'employer')
                ->where('is_featured', 1)->latest()->paginate()
        );
    }

    // Store a newly created resource in storage.
    public function store(CircularStoreRequest $request)
    {
        //get user company id
        $user = Auth::user();
        $employer = $user->employer;
        $company_id = $employer->company->id;
        $values = $request->validated();
        $values['company_id'] = $company_id;
        $data = Circular::create($values);
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

    public function getCompanyCirculars($slug)
    {
        try {
            // Fetch circular
            $company = Company::where('slug', $slug)->firstOrFail();
            $circular = Circular::with('category', 'employer')
                ->where('company_id', $company->id);

            return CircularResourceCollection::make($circular->paginate());


        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
