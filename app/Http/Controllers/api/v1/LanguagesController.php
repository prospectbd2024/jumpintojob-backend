<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguagesRequest;
use App\Http\Resources\LanguagesResource;
use App\Models\Languages;

class LanguagesController extends Controller
{
    public function index()
    {
        return LanguagesResource::collection(Languages::get());
    }

    public function store(LanguagesRequest $request)
    {
        return new LanguagesResource(Languages::create($request->validated()));
    }

    public function show(Languages $languages)
    {
        return new LanguagesResource($languages);
    }

    public function update(LanguagesRequest $request, Languages $languages)
    {
        $languages->update($request->validated());

        return new LanguagesResource($languages);
    }

    public function destroy(Languages $languages)
    {
        $languages->delete();

        return response()->json();
    }
    public function search($searchKey)
    {
        $languages = Languages::where('language', 'LIKE', '%' . $searchKey . '%')->get();
        return LanguagesResource::collection($languages);
    }
}
