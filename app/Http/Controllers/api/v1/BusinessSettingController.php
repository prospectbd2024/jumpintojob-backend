<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    public function index()
    {
        return BusinessSetting::all();
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return BusinessSetting::create($request->validated());
    }

    public function show(BusinessSetting $businessSetting)
    {
        return $businessSetting;
    }

    public function update(Request $request, BusinessSetting $businessSetting)
    {
        $request->validate([

        ]);

        $businessSetting->update($request->validated());

        return $businessSetting;
    }

    public function destroy(BusinessSetting $businessSetting)
    {
        $businessSetting->delete();

        return response()->json();
    }
}
