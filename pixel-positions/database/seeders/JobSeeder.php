<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();

        Job::factory(20)->state([
            'url' => 'https://tomemming.nl'
        ])->hasAttached($tags)->create();

        // Here
        Job::factory(5)->state([
            'featured' => true,
            'url' => 'https://tomemming.nl'
            ])
            ->hasAttached($tags)
            ->create();
    }
}
