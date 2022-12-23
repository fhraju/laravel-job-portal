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
            (request(['tag', 'search']))->get(),
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

       JobPosting::create($formFields);

       return redirect('/');
    }
}
