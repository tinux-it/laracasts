<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2><strong>Title: {{ $job['title'] }}</strong></h2> <br>
    <p> This job pays: ${{ $job['salary']  }}</p>
</x-layout>
