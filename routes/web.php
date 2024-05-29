<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(3);
    return view('jobs', ['jobs' => $jobs]);
});

Route::get('/jobs/{jobId}', function ($jobId) {
    $job = Job::find($jobId);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
