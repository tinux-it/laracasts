<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/register" class="space-y-8 divide-y divide-gray-900/10">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label>Name</x-form-label>
                        <x-form-input type="text" name="name" id="name" placeholder="Eind Baas" required />
                        <x-form-error name="name" />
                    </x-form-field>
                    <x-form-field>
                        <x-form-label>Email</x-form-label>
                        <x-form-input type="email" name="email" id="email" placeholder="Eindbaas@mijndomein.nl" required />
                        <x-form-error name="email" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label>Password</x-form-label>
                        <x-form-input type="password" name="password" id="password" required />
                        <x-form-error name="password" />
                    </x-form-field>
                </div>
            </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </div>

    </form>
</x-layout>
