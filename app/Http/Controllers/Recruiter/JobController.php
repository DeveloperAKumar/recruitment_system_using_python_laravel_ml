<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job; 

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $jobs = Job::where(
        'recruiter_id',
        auth()->id()
    )->latest()->get();

    return view(
        'recruiter.jobs.index',
        compact('jobs')
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('recruiter.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    Job::create([
        'recruiter_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'required_skills' => $request->required_skills,
        'experience' => $request->experience,
        'salary' => $request->salary,
        'status' => 'active'
    ]);

    return redirect()
        ->route('jobs.index')
        ->with('success','Job Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
