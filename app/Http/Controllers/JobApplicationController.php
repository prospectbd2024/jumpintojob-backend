<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function apply(Request $request)
    {
        $user = Auth::user();
        $cv = CV::find($request->cv_id);
        $user_id =  $cv->user_id;
        if ($user->id != $user_id) {
            return response()->json([
                'status' => false,
                'message' => 'User does not have permission'
            ], 403);
        }

        // Validate the request
        $request->validate([
            'cv_id' => 'required|integer',
            'job_id' => 'required|integer',
            'forwarding_letter' => 'nullable',
            'forwarding_letter_type' => 'nullable'// You can adjust the validation rules as needed
        ]);

        // Handle the file upload if it exists
        if ($request->hasFile('forwarding_letter')) {
            $file = $request->file('forwarding_letter');
            $path = $file->store('forwarding_letters', 'public'); // Store the file in the 'public/forwarding_letters' directory
        } else {
            $path = null;
        }
        $cv->applicant_status = $request->applicant_status;
        $cv->save();

        $job_application =JobApplication::where('user_id', $user_id)->where('job_id',$request->job_id)->first();
        if( !$job_application){
            $job_application = new JobApplication();
        }
        $job_application->user_id =  $user_id;
        $job_application->cv_id = $request->cv_id;
        $job_application->job_id = $request->job_id;
        $job_application->forwarding_letter_type =  $request->forwarding_letter_type ; // Save the file path
        $job_application->forwarding_letter =  $path??$request->forwarding_letter; // Save the file path
 
        $job_application->save();

        return response()->json([
            'status' => true,
            'message' => 'Applied successfully!'
        ]);
    }
    public function index( $user_id,Request $request)
    {
        $user = Auth::user();
        if($user->id!= $user_id){
            return response()->json([
                'status' => false,
                'message' => 'User does not have permission'
            ]);
        }
        $job_applications = JobApplication::where('user_id',$user_id)->get();

        return [
            'data' => $job_applications
        ];
    }
}
