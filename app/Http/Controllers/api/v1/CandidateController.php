<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return Candidate::all();
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return Candidate::create($request->validated());
    }

    public function show(Candidate $candidate)
    {
        return $candidate;
    }

    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([

        ]);

        $candidate->update($request->validated());

        return $candidate;
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return response()->json();
    }
}
