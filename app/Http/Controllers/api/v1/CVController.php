<?php

namespace App\Http\Controllers\api\v1;

use App\Exceptions\AppException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CVRequest;
use App\Http\Requests\CvUpdateFormRequest;
use App\Http\Resources\CVResource;
use App\Http\Resources\CvResourceCollection;
use App\Models\Cv;
use App\Models\CV as ModelsCV;
use App\Services\UserPlanService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CVController extends Controller
{
     
    public function getCV($cv_id) {
        $cv = Cv::find($cv_id);
        if (!$cv){
            return  response()->json([
                'status' => false,
                'message' => 'CV not found'
            ],Response::HTTP_NOT_FOUND);
        }
        return  response()->json([
        'status' => true,
        'data' => $cv->cv_html,
         ]);
    }

    public function saveCV(Request $request){
        $user_id = Auth::user()->id;

        $cv_html = $request->cv_html;
        $cv = ModelsCV::where('user_id' , $user_id) ->first();
        if(!$cv){
            $cv = new ModelsCV();
        }
        $cv-> cv_html =  $cv_html;
        $cv->user_id = $user_id;              
        $cv->save();        
             
         
        return response()->json(
            ['status' => true,
            'message' => 'CV saved',
            'cv_html' =>   $cv->cv_html,  
            ]
        );
    }

    

     

     

     
}
