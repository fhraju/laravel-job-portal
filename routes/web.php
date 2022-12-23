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
Route::get('/jobs/store', [JobPostingController::class, 'store']);

// Single Job Post
Route::get('/jobs/{jobid}', [JobPostingController::class, 'show']);