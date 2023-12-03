<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactTypeRequest;
use App\Http\Resources\ContactTypeResource;
use App\Models\ContactType;

class ContactTypeController extends Controller
{
    public function index()
    {
        return ContactTypeResource::collection(ContactType::all());
    }

    public function store(ContactTypeRequest $request)
    {
        return new ContactTypeResource(ContactType::create($request->validated()));
    }

    public function show(ContactType $contactType)
    {
        return new ContactTypeResource($contactType);
    }

    public function update(ContactTypeRequest $request, ContactType $contactType)
    {
        $contactType->update($request->validated());

        return new ContactTypeResource($contactType);
    }

    public function destroy(ContactType $contactType)
    {
        $contactType->delete();

        return response()->json();
    }
}
