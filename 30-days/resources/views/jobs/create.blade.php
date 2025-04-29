<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <form method="POST" action="/jobs" class="space-y-8 divide-y divide-gray-900/10">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label>Title</x-form-label>
                        <x-form-input type="text" name="title" id="title" placeholder="Eindbaas..."></x-form-input>
                            @error('title')
                                <x-form-error>{{ $message }}</x-form-error>
                            @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label>Salary</x-form-label>
                        <x-form-input type="text" name="salary" id="salary" placeholder="50k"></x-form-input>
                        @error('salary')
                            <x-form-error>{{ $message }}</x-form-error>
                        @enderror
                        </div>
                    </div>
                </div>

{{--  https://laravel.com/docs/12.x/validation#available-validation-rules -- }}
{{--                <div class="mt-10">--}}
{{--                    @if($errors->any())--}}
{{--                        <ul>--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <li class="text-sm/6 text-red-500 italic">{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    @endif--}}
{{--                </div>--}}
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
