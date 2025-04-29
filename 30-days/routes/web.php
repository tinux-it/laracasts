<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'salary' => '100000',
                'location' => 'London',
            ],
            [
                'id' => 2,
                'title' => 'test',
                'salary' => '200000',
                'location' => 'London',
            ],
            [
                'id' => 3,
                'title' => 'teacher',
                'salary' => '300000',
                'location' => 'London',
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
                [
                    'id' => 1,
                    'title' => 'Software Engineer',
                    'salary' => '100000',
                    'location' => 'London',
                ],
                [
                    'id' => 2,
                    'title' => 'test',
                    'salary' => '200000',
                    'location' => 'London',
                ],
                [
                    'id' => 3,
                    'title' => 'teacher',
                    'salary' => '300000',
                    'location' => 'London',
                ]
        ];

    $job = Arr::first($jobs, fn ($job)=> $job['id'] === (int) $id);
    return view('job', ['job' =>$job]);
});

Route::get('/contact', function () {
    return view('contact');
});

