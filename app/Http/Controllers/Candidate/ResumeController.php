<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{

public function index()
{
    $resumes = Resume::where(
        'candidate_id',
        auth()->id()
    )->latest()->get();

    return view(
        'candidate.resume.index',
        compact('resumes')
    );
}


    public function create()
{
    return view('candidate.resume.create');
}





public function store(Request $request)
{
    $request->validate([
        'resume' => 'required|mimes:pdf|max:5120'
    ]);

    $file = $request->file('resume');

    $filename = time().'_'.$file->getClientOriginalName();

    $file->move(
        public_path('uploads/resumes'),
        $filename
    );

    Resume::create([
        'candidate_id' => auth()->id(),
        'resume_file' => $filename
    ]);

    return redirect()
        ->route('resume.index')
        ->with('success','Resume Uploaded Successfully');
}
}
