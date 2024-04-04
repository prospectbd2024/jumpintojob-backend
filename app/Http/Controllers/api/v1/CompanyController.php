<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyResourceCollection;
use App\Models\Company;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {   
        $category_id =$request->category_id;
        $is_category_id = ($category_id!='all' && $category_id != null ) ;
        $category_id = $is_category_id && $category_id =='others'? null : $category_id;
        $companies = $is_category_id?  Company::where('category_id',$category_id)->get() : Company::get();
        return CompanyResourceCollection::make(($companies));
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
    public function show_slug(Request $request)

    {   
        $slug = $request->slug;
        $company = Company::where('slug',$slug)->first();
        return CompanyResource::make($company);
    }
}
