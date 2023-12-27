<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateContact\CandidateContactStoreRequest;
use App\Http\Requests\CandidateContact\CandidateContactUpdateRequest;
use App\Http\Resources\CandidateContact\CandidateContactResource;
use App\Http\Resources\CandidateContact\CandidateContactResourceCollection;
use App\Models\CandidateContact;
use Symfony\Component\HttpFoundation\Response;

class CandidateContactController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return CandidateContactResourceCollection::make((CandidateContact::get()));
    }

    // Store a newly created resource in storage.
    public function store(CandidateContactStoreRequest $request)
    {
        return CandidateContactResource::make(CandidateContact::create($request->validated()));
    }

    // Display the specified resource.
    public function show($slug)
    {
        $candidatecontact = CandidateContact::where('slug', $slug)->firstOrFail();
        return CandidateContactResource::make($candidatecontact);
    }

    // Update the specified resource in storage.
    public function update(CandidateContactUpdateRequest $request, CandidateContact $candidatecontact)
    {
        $candidatecontact->update($request->validated());
        return CandidateContactResource::make($candidatecontact);
    }

    // Remove the specified resource from storage.
    public function destroy(CandidateContact $candidatecontact)
    {
        $candidatecontact->delete();

        return response()->json([
        'success' => true,
        'message' => 'CandidateContact deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
