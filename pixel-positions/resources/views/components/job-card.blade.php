@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer->name }}</div>
    <div class="">

    </div>

    <div class="py-8">
        <a href="{{ $job->url }}" target="_blank">
            <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">{{ $job->title }}</h3>
            <p class="text-sm mt-4">{{ $job->schedule }}: {{ $job->salary }}</p>
        </a>
    </div>

    <div class="flex justify-between item-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>

        <x-employer-logo :employer="$job->employer" :width="42" />
    </div>
</x-panel>
