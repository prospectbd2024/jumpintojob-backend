<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply(Request $request){
        $user = Auth::user();
        $cv = CV::find($request->cv_id);
        if($user->id != $cv->user_id ){
            return response()->json([
                'status' => false,
                'message' => 'User does not have permision'
            ]);
        }
        $job_application = new JobApplication();
        $job_application->user_id = $user->id ;
        $job_application->cv_id = $request->cv_id  ;
        $job_application->job_id = $request->job_id  ;
        $job_application-> save() ;
        return response()->json([
            'status' => true,
            'message' => 'applied successfully!'
        ]);

    }
}
