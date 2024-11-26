<div>
    <div class="container w-full  p-12 bg-white shadow-md rounded-lg">
        <div class="w-full">
            <h2 class="text-2xl font-bold text-center mb-4">{{ __('Forgot Password') }}</h2>

            @if (session('success'))
                <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form wire:submit.prevent="sendResetLink" class="space-y-4">
                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <input type="email" id="email" wire:model="email"
                        class="mt-1 block w-full px-8 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                        placeholder="{{ __('Enter your email') }}">
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">{{ __('Send Reset Link') }}</button>
            </form>
        </div>
    </div>

</div>
