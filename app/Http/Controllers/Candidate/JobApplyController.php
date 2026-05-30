<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
   public function jobs(){
        $jobs = Job::where('status','active')->latest()->get();
        $appliedJobs = JobApplication::where('candidate_id',auth()->id())->pluck('job_id')->toArray();
        return view('candidate.jobs.index',compact('jobs','appliedJobs')
    );
}


public function apply($jobId)
{
    JobApplication::firstOrCreate([
        'job_id' => $jobId,
        'candidate_id' => auth()->id()
    ]);

    return back()->with(
        'success',
        'Job Applied Successfully'
    );
}
}
