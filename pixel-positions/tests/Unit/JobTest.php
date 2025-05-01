<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_it_belongs_to_employer(): void
    {
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id
        ]);

        expect($job->employer()->is($employer))->toBeTrue();
    }

    public function test_it_can_have_tags(): void
    {
        $job = Job::factory()->create();

        $job->tag('frontend');

        expect($job->tags)->toHaveCount(1);
    }
}
