<x-layouts.auth>

    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6">
            <a wire:navigate href="{{ route('dashboard') }}"
                class="text-2xl font-bold text-center underline mb-6">{{ __('Back to Dashboard') }}</a>

            <div class="bg-gray-50 p-4 rounded-lg">
                @if (session('status'))
                    <div class="mb-4 text-green-700 bg-green-100 border border-green-400 rounded-lg p-4">
                        {{ session('status') }}
                    </div>
                @endif

                <p class="text-gray-700 text-center">{{ __('You are logged in!') }}</p>
            </div>
        </div>
    </div>

</x-layouts.auth>
