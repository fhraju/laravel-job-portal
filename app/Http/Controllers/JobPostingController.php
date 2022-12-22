<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index() 
    {
        return view('job_posts.index', [
            'heading' => 'Latest Jobs',
            'job_lists' => JobPosting::all(),
        ]);
    }
    public function show(JobPosting $jobid)
    {
        return view('job_posts.show', [
            'job' => $jobid
        ]);
    }
}
