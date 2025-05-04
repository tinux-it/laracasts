<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Lets find your next job!</h1>
            <x-forms.form action="/search" class="mt-6 bg-white/10">
                <x-forms.input
                    :label="false"
                    name="q"
                    placeholder="Web Developer.."
                ></x-forms.input>

            </x-forms.form>
        </section>
        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="mt-6 grid lg:grid-cols-3 gap-8">
                @foreach($jobs as $job)
                    @if($job->featured)
                        <x-job-card :$job />
                    @endif
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                @foreach($tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>

        </section>
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @foreach($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>

        </section>
    </div>
</x-layout>
