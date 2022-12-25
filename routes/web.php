<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobPostingController;

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
Route::get('/jobs/create', [JobPostingController::class, 'create'])->middleware('auth');

// Store Job post Data
Route::post('/jobs/store', [JobPostingController::class, 'store'])->middleware('auth');

// Show Edit form
Route::get('/jobs/{jobid}/edit', [JobPostingController::class, 'edit'])->middleware('auth');

// Update job post data
Route::put('/jobs/{jobid}', [JobPostingController::class, 'update'])->middleware('auth');

// Delete job post
Route::delete('/jobs/{jobid}', [JobPostingController::class, 'destroy'])->middleware('auth');

// Manage Job posts
Route::get('/jobs/manage', [JobPostingController::class, 'manage'])->middleware('auth');

// Single Job Post
Route::get('/jobs/{jobid}', [JobPostingController::class, 'show']);

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// User Log out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Authenticate the user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
