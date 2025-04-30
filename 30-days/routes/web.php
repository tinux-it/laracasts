<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {

    TranslateJob::dispatch();
//    dispatch(static function () {
//        logger('Hello from queue');
//    })->delay(5);

//    Mail::to('tomemming@hotmail.com')->send(new App\Mail\JobPosted());

    return 'Done';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');


// Group all Jobs related routes to the JobsController, which will then handle it based on the function names
//Route::resource('jobs', JobController::class);

// Set authorization on the specific route by using Middleware
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'job'); // Users the JobPolicy to check if it is possible

    Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')
        ->can('edit-job', 'job'); // Uses the Gate in the AppServiceProvider to check

    Route::delete('/jobs/{job}','destroy')
        ->middleware('auth')
        ->can('edit-job', 'job');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']); // Using a POST disabled the possiblity of beign logged out via CSRF
