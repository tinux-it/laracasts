<x-layout>
    <x-page-heading>Add new job listing</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="CEO" />
        <x-forms.input label="Salary" name="salary" placeholder="$ 150.000" />
        <x-forms.input label="Location" name="location" placeholder="Remote" />

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://my-awesome-url.com/ceo" />
        <x-forms.checkbox label="Featured (costs extra)" name="featured"></x-forms.checkbox>

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="Laracasts, video, education" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
