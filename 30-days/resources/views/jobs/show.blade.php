<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2><strong>Title: {{ $job->title }}</strong></h2> <br>
    <p>
        This job pays: ${{ $job->salary  }}
    </p>

    {{-- Uses the JobPolicy to check if the user is authorized --}}
    @can('edit', $job)
        <p class="mt-6">
           <x-button href="/jobs/{{ $job->id }}/edit">Edit job</x-button>
        </p>
    @endcan
</x-layout>
