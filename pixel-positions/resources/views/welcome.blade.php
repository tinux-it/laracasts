<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Lets find your next job!</h1>
            <form action="">
                <input
                    type="text"
                    placeholder="I'm looking for.."
                    class="rounded-xl bg-white/5 border border-white/10 px-5 py-4 w-full max-w-xl mt-6">
            </form>
        </section>
        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="mt-6 grid lg:grid-cols-3 gap-8">
                <x-job-card />
                <x-job-card />
                <x-job-card />
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
                <x-tag>Tag 2</x-tag>
            </div>

        </section>
        <section>
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                <x-job-card-wide/>
                <x-job-card-wide/>
                <x-job-card-wide/>
            </div>

        </section>
    </div>
</x-layout>
