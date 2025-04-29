<?php

namespace App\Models;

use Illuminate\Support\Arr;

final class Job
{
    public static function all(): array
    {
        return [
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

    }

    public static function find(int $id): array
    {
        $job = Arr::first(Job::all(), static fn ($job)=> $job['id'] ===  $id);
        if (!$job) {
            abort(404, 'Job not found');
        }

        return $job;
    }
}
