<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyResourceCollection;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    // Display a listing of the resource.

    public function index(Request $request)
    {
        $category = $request->category;
        $companies = [];
    
        if (in_array($category, ['all-industries', null])) {
            $companies = Company::all();
            return CompanyResourceCollection::make($companies);
        }
    
        if ($category === 'others') {
            $companies = Company::whereNull('category_id')->get();
            return CompanyResourceCollection::make($companies);
        }
    
        $category = Category::where('slug',  $category )->first();
        if ($category) {
            $companies = Company::where('category_id', $category->id)->get();
        }
         
    
        return CompanyResourceCollection::make($companies);
    }
    // Display a listing of the resource.
    public function featuredCompanies(Request $request): CompanyResourceCollection
    {
        return CompanyResourceCollection::make(Company::where('is_featured',1)->paginate());
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
