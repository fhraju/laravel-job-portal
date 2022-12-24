<?php

use App\Http\Controllers\JobPostingController;
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
Route::get('/', [JobPostingController::class, 'index']);

// Show create form
Route::get('/jobs/create', [JobPostingController::class, 'create']);

// Store Job post Data
Route::post('/jobs/store', [JobPostingController::class, 'store']);

// Show Edit form
Route::get('/jobs/{jobid}/edit', [JobPostingController::class, 'edit']);

// Update job post data
Route::put('/jobs/{jobid}', [JobPostingController::class, 'update']);

// Delete job post
Route::delete('/jobs/{jobid}', [JobPostingController::class, 'destroy']);

// Single Job Post
Route::get('/jobs/{jobid}', [JobPostingController::class, 'show']);