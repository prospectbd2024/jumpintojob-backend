<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyResourceCollection;
use App\Models\Company;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return CompanyResourceCollection::make((Company::paginate()));
    }

    // Store a newly created resource in storage.
    public function store(CompanyStoreRequest $request)
    {
        return CompanyResource::make(Company::create($request->validated()));
    }

    // Display the specified resource.
    public function show(Company $company)
    {
        return CompanyResource::make($company);
    }

    // Update the specified resource in storage.
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->validated());
        return CompanyResource::make($company);
    }

    // Remove the specified resource from storage.
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json([
        'success' => true,
        'message' => 'Company deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
        