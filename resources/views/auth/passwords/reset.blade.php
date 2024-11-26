<x-layouts.auth>
    <div class="flex justify-center items-center h-screen  bg-gray-100">
        <div class="w-full bg-white rounded-lg shadow-md px-20 py-6">
            <h2 class="text-2xl font-bold text-center mb-6">{{ __('Reset Password') }}</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <input id="email" type="email"
                        class="mt-1 block px-12 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 @error('email') border-red-500 @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="mt-1 block px-12 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm"
                        class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password"
                        class="mt-1 block px-12 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-600 px-12 py-3 text-white font-medium  rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.auth>
