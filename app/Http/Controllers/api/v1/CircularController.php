<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Circular\CircularStoreRequest;
use App\Http\Requests\Circular\CircularUpdateRequest;
use App\Http\Resources\Circular\CircularResource;
use App\Http\Resources\Circular\CircularResourceCollection;
use App\Http\Resources\JobApplicantResource;
use App\Models\Circular;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CircularController extends Controller
{
    // Display a listing of the resource.
    /**
     * Display a listing of the circulars.
     *
     * @return array
     */
    public function index(): array
    {
        $circulars = Circular::with('category', 'employer')->latest()->paginate(10);
        return [
            'data' => CircularResourceCollection::make($circulars),
            'pagination' => [
                'currentPage' => $circulars->currentPage(),  // Correct method name
                'totalPages' => $circulars->lastPage(),      // Correct method name
                'perPage' => $circulars->perPage(),          // Correct method name
                'total' => $circulars->total(),              // Total items available
            ]
        ];
    }


    /**
     * Display a listing of the circulars from its own creator.
     *
     * @return array
     */
    public function employerjobs(): array
    {
        $circulars = Circular::with('category', 'employer')
            ->where('employer_id', auth()->user()->employer->id)->latest()->paginate(10);
        return [
            'data' => CircularResourceCollection::make($circulars),
            'pagination' => [
                'currentPage' => $circulars->currentPage(),  // Correct method name
                'totalPages' => $circulars->lastPage(),      // Correct method name
                'perPage' => $circulars->perPage(),          // Correct method name
                'total' => $circulars->total(),              // Total items available
            ]
        ];
    }

    /**
     * Display a listing of the circular with job applicants.
     *
     * @return JsonResponse
     */
    public function indexWithApplicants(): JsonResponse
    {
        $employerId = auth()->user()->employer->id;
        $jobs = Circular::where('employer_id', $employerId)
            ->with('jobApplications')
            ->paginate(10); // Adjust '10' to the number of records you want per page.

        $data = $jobs->getCollection()->map(function ($job) {
            return [
                'id' => $job->id,
                'job_title' => $job->title,
                'applicants_count' => $job->jobApplications->count(),
                'applicants' => JobApplicantResource::collection($job->jobApplications),
            ];
        });

        // Modify the pagination response to include the transformed data.
        return response()->json([
            'data' => $data,
            'meta' => [
                'current_page' => $jobs->currentPage(),
                'last_page' => $jobs->lastPage(),
                'per_page' => $jobs->perPage(),
                'total' => $jobs->total(),
            ],
        ]);
    }

    public function search(Request $request): array
    {
        // Retrieve the search key and location from the request
        $searchKey = $request->searchKey;
        $location = $request->location;

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
        $circulars = $query->latest()->paginate(10);

        // Return the collection
        return [
            'data' => CircularResourceCollection::make($circulars),
            'pagination' => [
                'currentPage' => $circulars->currentPage(),  // Correct method name
                'totalPages' => $circulars->lastPage(),      // Correct method name
                'perPage' => $circulars->perPage(),          // Correct method name
                'total' => $circulars->total(),              // Total items available
            ]
        ];
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
