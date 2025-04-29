<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('home');
});
Route::get('/jobs', static function() {
    /**
     * Do not lazy-load but gather all Models beforehand
     * This brings down the amount of queries from 100+ to 2 (N+1 problem)
     */
    $jobs = Job::with('employer')->get();
    return view('jobs', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/{id}', static function ($id) {
    $job = Job::find($id);

    return view('job', ['job' =>$job]);
});

Route::get('/contact', static function () {
    return view('contact');
});
