<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchPreferenceRequest;
use App\Http\Resources\SearchPreferenceResource;
use App\Models\SearchPreference;

class SearchPreferenceController extends Controller
{
    public function index()
    {
        return SearchPreferenceResource::collection(SearchPreference::all());
    }

    public function store(SearchPreferenceRequest $request)
    {
        return new SearchPreferenceResource(SearchPreference::create($request->validated()));
    }

    public function show(SearchPreference $searchPreference)
    {
        return new SearchPreferenceResource($searchPreference);
    }

    public function update(SearchPreferenceRequest $request, SearchPreference $searchPreference)
    {
        $searchPreference->update($request->validated());

        return new SearchPreferenceResource($searchPreference);
    }

    public function destroy(SearchPreference $searchPreference)
    {
        $searchPreference->delete();

        return response()->json();
    }
}
