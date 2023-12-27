<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUseTypeRequest;
use App\Http\Resources\ContactUseTypeResource;
use App\Models\ContactUseType;

class ContactUseTypeController extends Controller
{
    public function index()
    {
        return ContactUseTypeResource::collection(ContactUseType::all());
    }

    public function store(ContactUseTypeRequest $request)
    {
        return new ContactUseTypeResource(ContactUseType::create($request->validated()));
    }

    public function show(ContactUseType $contactUseType)
    {
        return new ContactUseTypeResource($contactUseType);
    }

    public function update(ContactUseTypeRequest $request, ContactUseType $contactUseType)
    {
        $contactUseType->update($request->validated());

        return new ContactUseTypeResource($contactUseType);
    }

    public function destroy(ContactUseType $contactUseType)
    {
        $contactUseType->delete();

        return response()->json();
    }
}
