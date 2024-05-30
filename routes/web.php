<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//Index 
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

//Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//Show Job
Route::get('/jobs/{job}', function (Job $job) {
    // $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

//Post job
Route::post('/jobs', function () {
    //validations...
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});


//Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});


//Update
Route::patch('/jobs/{job}', function (Job $job) {
    //authorize .... ON HOLD
    //Validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});


//Delete
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});


//Contact
Route::get('/contact', function () {
    return view('contact');
});
