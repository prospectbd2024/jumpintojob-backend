<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notification\NotificationStoreRequest;
use App\Http\Requests\Notification\NotificationUpdateRequest;
use App\Http\Resources\Notification\NotificationResource;
use App\Http\Resources\Notification\NotificationResourceCollection;
use App\Models\Notification;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return NotificationResourceCollection::make((Notification::paginate()));
    }

    // Store a newly created resource in storage.
    public function store(NotificationStoreRequest $request)
    {
        return NotificationResource::make(Notification::create($request->validated()));
    }

    // Display the specified resource.
    public function show(Notification $notification)
    {
        return NotificationResource::make($notification);
    }

    // Update the specified resource in storage.
    public function update(NotificationUpdateRequest $request, Notification $notification)
    {
        $notification->update($request->validated());
        return NotificationResource::make($notification);
    }

    // Remove the specified resource from storage.
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json([
        'success' => true,
        'message' => 'Notification deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
