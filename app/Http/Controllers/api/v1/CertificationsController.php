<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificationsRequest;
use App\Http\Resources\CertificationsResource;
use App\Models\Certifications;

class CertificationsController extends Controller
{
    public function index()
    {
        return CertificationsResource::collection(Certifications::all());
    }

    public function store(CertificationsRequest $request)
    {
        return new CertificationsResource(Certifications::create($request->validated()));
    }

    public function show(Certifications $certifications)
    {
        return new CertificationsResource($certifications);
    }

    public function update(CertificationsRequest $request, Certifications $certifications)
    {
        $certifications->update($request->validated());

        return new CertificationsResource($certifications);
    }

    public function destroy(Certifications $certifications)
    {
        $certifications->delete();

        return response()->json();
    }
}
