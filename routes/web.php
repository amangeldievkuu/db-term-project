<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
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


//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//Login
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

//Contact
Route::view('/contact', 'contact');
