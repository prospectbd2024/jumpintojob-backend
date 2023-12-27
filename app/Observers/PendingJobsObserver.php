<?php

namespace App\Observers;

use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Log;

class PendingJobsObserver
{
    public function handlePending()
    {
        $pendingJobs = Job::where('status', 'pending')->get();

        foreach ($pendingJobs as $job) {
            try {
                $job->handlePending(); // Assuming you have a handlePending method in your Job model
                Log::info("Handled pending job with ID: " . $job->id);
            } catch (\Exception $e) {
                Log::error("Error handling pending job with ID: " . $job->id . " - " . $e->getMessage());
            }
        }
    }
}
