<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\CandidateStoreRequest;
use App\Http\Requests\Candidate\CandidateUpdateRequest;
use App\Http\Resources\Candidate\CandidateResource;
use App\Http\Resources\Candidate\CandidateResourceCollection;
use App\Models\Candidate;
use Symfony\Component\HttpFoundation\Response;

class CandidateController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return CandidateResourceCollection::make((Candidate::get()));
    }

    // Store a newly created resource in storage.
    public function store(CandidateStoreRequest $request)
    {
        return CandidateResource::make(Candidate::create($request->validated()));
    }

    // Display the specified resource.
    public function show($slug)
    {
        $candidate = Candidate::where('slug', $slug)->firstOrFail();
        return CandidateResource::make($candidate);
    }

    // Update the specified resource in storage.
    public function update(CandidateUpdateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->validated());
        return CandidateResource::make($candidate);
    }

    // Remove the specified resource from storage.
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return response()->json([
        'success' => true,
        'message' => 'Candidate deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
