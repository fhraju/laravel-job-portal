<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobPosting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// All Job Postings
Route::get('/', function(){
    return view('jobs', [
        'heading' => 'Latest Jobs',
        'job_lists' => JobPosting::all(),
    ]);
});

// Single Job Post
Route::get('/jobs/{jobid}', function(JobPosting $jobid) {
        return view('job', [
            'job' => $jobid
        ]);
});
