<?php

namespace App\Http\Controllers\api\v1;

use App\Exceptions\AppException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CVRequest;
use App\Http\Requests\CvUpdateFormRequest;
use App\Http\Resources\CVResource;
use App\Http\Resources\CvResourceCollection;
use App\Models\CV;
use App\Models\User;
use App\Services\UserPlanService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function Laravel\Prompts\error;

class CVController extends Controller
{
    public function createCV(CVRequest $request)
    {
        $user = auth()->user();
        $userPlanService = app(UserPlanService::class);

        if ($userPlanService->isFreePlan() && $userPlanService->hasReachedCvPlanLimit()) {
            return errorResponse(
                'plan_limit_reached',
                'You have reached the CV creation limit for the Free plan.',
                403);
        }

        $cv = $this->createUserCV($user, $request->validated());

        return new CVResource($cv);
    }

    private function createUserCV(User $user, array $data)
    {
        return $user->cvs()->create($data);
    }

    /**
     * @throws \Exception
     */
    public function getUserCVs()
    {
        $cv = auth()->user()->cvs;

        if ($cv->isEmpty()) {
            throw new AppException('CV collection is empty', Response::HTTP_NO_CONTENT);
        }
        return new CvResourceCollection($cv);
    }

    public function getCVDetails(CV $CV, Exception $e)
    {
        if ($CV->user_id !== auth()->id()) {
            return errorResponse(
                'unauthorized',
                'You are not authorized to view this CV.',
                Response::HTTP_UNAUTHORIZED
            );
        }
        return new CVResource($CV);
    }

    public function update(CvUpdateFormRequest $request, $id)
    {
        $cvModel = CV::where('id', $id)
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

    public function deleteCV(CV $CV)
    {
        $CV->delete();

        return response()->json();
    }
}
