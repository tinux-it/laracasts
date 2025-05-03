@if (session('success'))
    <div class="mx-auto max-w-7xl px-4 pt-4">
        <div class="rounded-md bg-green-100 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="mx-auto max-w-7xl px-4 pt-4">
        <div class="rounded-md bg-red-100 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.366-.446.957-.537 1.43-.208a1 1 0 01.208 1.43L9.414 6h1.172l.519-1.679a1 1 0 011.855.89L12.172 6H13a1 1 0 010 2h-1.057l-1.25 4H13a1 1 0 110 2h-2a1 1 0 01-.894-.553l-1.447-2.894a1 1 0 00-1.788 0L5.894 13.447A1 1 0 015 14H3a1 1 0 010-2h1.828l.99-3.155L4 6H3a1 1 0 110-2h1.828l1.024-3.267a1 1 0 011.405-.634z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3 text-sm font-medium text-red-700">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    </div>
@endif
