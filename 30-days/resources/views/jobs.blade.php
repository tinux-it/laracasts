<x-layout>
    <x-slot:heading>
        Job postings
    </x-slot:heading>
    <ul>
    @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:text-blue-600">
                <strong>{{ $job['title'] }}</strong>, pays: {{ $job['salary'] }}
            </a>
        </li>
    @endforeach
    </ul>
</x-layout>
