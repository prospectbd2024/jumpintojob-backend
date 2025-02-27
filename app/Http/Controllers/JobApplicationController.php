<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobApplicationResource;
use App\Models\CV;
use App\Models\JobApplication;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function apply(Request $request)
    {

        $user = Auth::user();
        if($user->user_type!=="job_seeker"){
            return response()->json([
                "success" => false,
                "message" => "User is not a job seeker!"
            ]);
        }
        // Validate the request
        $request->validate([
            'cv_id' => 'nullable|integer',
            'cv_file' => 'nullable|file',
            'job_id' => 'required|integer',
            'forwarding_letter' => 'nullable',
            'forwarding_letter_type' => 'nullable' // You can adjust the validation rules as needed
        ]);
        
        if ($request->input('cv_id')) {
            try {
                $cv = CV::find($request->input('cv_id'));
                $cv->applicant_status = $request->applicant_status;
                $cv->save();
            } catch (Exception $e) {
                $cv = null;
            }
        } else {
            $cv = null;
        }
        // Handle the file upload if it exists
        if ($request->hasFile('forwarding_letter')) {
            $file = $request->file('forwarding_letter');
            $path = $file->store('forwarding_letters', 'public'); // Store the file in the 'public/forwarding_letters' directory
        } else {
            $path = null;
        }
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $cv_file = $file->store('cv_files', 'public'); // Store the file in the 'public/forwarding_letters' directory
        } else {
            $cv_file = null;
        }


        $job_application = JobApplication::where('user_id',  $user->id)->where('job_id', $request->job_id)->first();
        if (!$job_application) {
            $job_application = new JobApplication();
        }
        $job_application->user_id =  $user->id;
        $job_application->cv_id = $cv ? $cv->id : null;
        $job_application->job_id = $request->job_id;
        $job_application->forwarding_letter_type =  $request->forwarding_letter_type; // Save the file path
        $job_application->forwarding_letter =  $path ?? $request->forwarding_letter; // Save the file path
        $job_application->cv_file = $cv_file;

        $job_application->save();

        return response()->json([
            'status' => true,
            'message' => 'Applied successfully!'
        ]);
    }
    public function index(Request $request)
    {

        $job_applications = JobApplication::where('user_id', auth()->user()->id)->paginate(10);

        return JobApplicationResource::collection($job_applications);
    }
}
