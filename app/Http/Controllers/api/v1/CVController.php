<?php

namespace App\Http\Controllers\api\v1;

use App\Exceptions\AppException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CVRequest;
use App\Http\Requests\CvUpdateFormRequest;
use App\Http\Resources\CVResource;
use App\Http\Resources\CvResourceCollection;
use App\Models\Cv;
use App\Services\UserPlanService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CVController extends Controller
{
    private UserPlanService $userPlanService;

    public function __construct(UserPlanService $userPlanService)
    {
        $this->userPlanService = $userPlanService;
    }

    public function create(CVRequest $request)
    {
        if ($this->userPlanService->hasReachedCvPlanLimit()) {
            return errorResponse(
                'plan_limit_reached',
                'You have reached the Cv creation limit for the Free plan.',
                403);
        }

        $cv = new Cv($request->validated());
        $cv->save();
        return CVResource::make($cv);
    }

    public function getUserCvList()
    {
        $cv = auth()->user()->cvs;

        if ($cv->isEmpty()) {
            throw new AppException('Cv collection is empty', Response::HTTP_NO_CONTENT);
        }
        return new CvResourceCollection($cv);
    }

    public function getCvDetails(Cv $CV)
    {
        if ($CV->user_id !== auth()->id()) {
            return errorResponse(
                'unauthorized',
                'You are not authorized to view this Cv.',
                Response::HTTP_UNAUTHORIZED
            );
        }
        return new CVResource($CV);
    }

    public function update(CvUpdateFormRequest $request, $id)
    {
        $cvModel = Cv::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$cvModel) {
            return errorResponse(
                'not_found',
                'Cv not found.',
                404);
        }

        $cvModel->update($request->validated());

        return new CVResource($cvModel);
    }

    public function delete(Cv $CV)
    {
        $CV->delete();

        return response()->json();
    }
}
