<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificationsRequest;
use App\Http\Resources\CertificationsResource;
use App\Models\Certification;

class CertificationsController extends Controller
{
    public function index()
    {
        return CertificationsResource::collection(Certification::all());
    }

    public function store(CertificationsRequest $request)
    {
        return new CertificationsResource(Certification::create($request->validated()));
    }

    public function show(Certification $certifications)
    {
        return new CertificationsResource($certifications);
    }

    public function update(CertificationsRequest $request, Certification $certifications)
    {
        $certifications->update($request->validated());

        return new CertificationsResource($certifications);
    }

    public function destroy(Certification $certifications)
    {
        $certifications->delete();

        return response()->json();
    }
}
