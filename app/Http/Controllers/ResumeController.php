<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use MongoDB\Laravel\Eloquent\Casts\ObjectId;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return (new Resume)->where('user_id', auth()->id())->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Validate request
        $request->validate([
            'json_payload' => 'required|array'
        ]);

        // Create a new resume document
        $resume = new Resume();
        $resume->user_id = auth()->id();
        $resume->payload = $request->payload;
        $resume->save();

        return response()->json(['message' => 'profile document stored successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|array|Resume|null
    {
        return Resume::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, $id): JsonResponse
    {
        // Validate request
        $request->validate([
            'json_payload' => 'required|array'
        ]);

        // Create a new resume document
        $resume = (new Resume)->findOrFail($id);
        $resume->payload = $request->payload;
        $resume->save();
        return response()->json(['message' => 'profile document updated successfully']);
    }
}
