<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobPostingController extends Controller
{
    // Show all job post
    public function index() 
    {
        
        return view('job_posts.index', [
            'job_lists' => JobPosting::latest()->filter
            (request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show single job post
    public function show(JobPosting $jobid)
    {
        return view('job_posts.show', [
            'job' => $jobid
        ]);
    }

    // Show jobpost create form
    public function create()
    {
        return view('job_posts.create');
    }

    // Store Jobpost Data
    public function store(Request $request)
    {
       $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('job_postings', 'company')],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
       ]);

       if ($request->hasFile('logo'))
       {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

       JobPosting::create($formFields);

       return redirect('/')->with('message', 'Job Posted Successfully');
    }

    // Show jobpost edit form
    public function edit(JobPosting $jobid)
    {
        return view('job_posts.edit', ['job' => $jobid]);
    }

    // Update Jobpost Data
    public function update(Request $request, JobPosting $jobid)
    {
        $formFields = $request->validate([
        'title' => 'required',
        'company' => 'required',
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
        ]);

        if ($request->hasFile('logo'))
        {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $jobid->update($formFields);

        return back()->with('message', 'Job Updated Successfully');
    }

    // Delete Job Post
    public function destroy(JobPosting $jobid)
    {
        $jobid->delete();
        return redirect('/')->with('message', 'JobPost Deleted Successfully');
    }
}
