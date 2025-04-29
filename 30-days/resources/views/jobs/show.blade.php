<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2><strong>Title: {{ $job->title }}</strong></h2> <br>
    <p>
        This job pays: ${{ $job->salary  }}
    </p>

    <p class="mt-6">
       <x-button href="/jobs/{{ $job->id }}/edit">Edit job</x-button>
    </p>
</x-layout>
