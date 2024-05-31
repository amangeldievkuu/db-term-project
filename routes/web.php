<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::controller(JobController::class)->group(function () {
    Route::view('/', 'home');
    Route::get('/jobs', 'index');               //Index 
    Route::get('/jobs/create', 'create');       //Create
    Route::get('/jobs/{job}', 'show');          //Show
    Route::post('/jobs', 'store');              //Store
    Route::get('/jobs/{job}/edit', 'edit');     //Edit
    Route::patch('/jobs/{job}', 'update');      //Update
    Route::delete('/jobs/{job}', 'destroy');    //Delete
});

//Contact
Route::view('/contact', 'contact');
