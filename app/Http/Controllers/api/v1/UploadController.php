<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Http\Resources\UploadResource;
use App\Models\Upload;

class UploadController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Upload::class);

        return UploadResource::collection(Upload::all());
    }

    public function store(UploadRequest $request)
    {
        $this->authorize('create', Upload::class);

        return new UploadResource(Upload::create($request->validated()));
    }

    public function show(Upload $upload)
    {
        $this->authorize('view', $upload);

        return new UploadResource($upload);
    }

    public function update(UploadRequest $request, Upload $upload)
    {
        $this->authorize('update', $upload);

        $upload->update($request->validated());

        return new UploadResource($upload);
    }

    public function destroy(Upload $upload)
    {
        $this->authorize('delete', $upload);

        $upload->delete();

        return response()->json();
    }
}
