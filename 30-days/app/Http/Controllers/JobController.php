<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        /**
         * Do not lazy-load but gather all Models beforehand
         * This brings down the amount of queries from 100+ to 2 (N+1 problem)
         * $jobs = Job::with('employer')->get();
         * */
        $jobs = Job::with('employer')->latest()->simplePaginate(5);

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);

    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3', 'max:25'],
            'salary' => ['required'],
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)->send(new JobPosted($job));

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        // Also runs the gate::authorize thing defined in the AppServiceProvider
//        if (Auth::user()->cannot('edit-job', $job)) {
//            abort(403);
//        }
        Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
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
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
