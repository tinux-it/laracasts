@props(['job'])

<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>
    <div class="flex-1 flex flex-col">
        <div class="self-start text-sm text-gray-400">{{ $job->employer->name }}</div>
            <a href="{{ $job->url }}">
                <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">{{ $job->title }}</h3>
                <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }}: {{ $job->salary }}</p>
            </a>
    </div>

    <div class="self-end">
        @foreach($job->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
