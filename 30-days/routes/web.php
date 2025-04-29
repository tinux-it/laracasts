<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('home');
});

// Index
Route::get('/jobs', static function() {
    /**
     * Do not lazy-load but gather all Models beforehand
     * This brings down the amount of queries from 100+ to 2 (N+1 problem)
     * $jobs = Job::with('employer')->get();
     * */
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

// Create
Route::get('/jobs/create', static function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', static function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' =>$job]);
});

// Store
Route::post('/jobs', static function () {
    request()->validate([
        'title' => ['required', 'min:3', 'max:25'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', static function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' =>$job]);
});

// Update
Route::patch('/jobs/{job}', static function (Job $job) {
    // Validate
    request()->validate([
        'title' => ['required', 'min:3', 'max:25'],
        'salary' => ['required'],
    ]);

    // authorize (On hold....)

    // Update job
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    // Persist
    $job->save();

    // Redirect to the job page
    return redirect(sprintf('/jobs/%s', $job->id));
});

// Destroy
Route::delete('/jobs/{job}', static function (Job $job) {
    $job->delete();

    return redirect('/jobs');
});

Route::get('/contact', static function () {
    return view('contact');
});
