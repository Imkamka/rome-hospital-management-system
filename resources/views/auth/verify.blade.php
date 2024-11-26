<x-layouts.auth>

    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="w-full  bg-white rounded-lg shadow-lg px-20 py-6">
            <h2 class="text-2xl font-bold text-center mb-6">{{ __('Verify Your Email Address') }}</h2>

            <div class="bg-gray-50 py-4 px-8 rounded-lg">
                @if (session('resent'))
                    <div class="mb-4 text-green-700 bg-green-100 border border-green-400 rounded-lg p-4">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <p class="text-gray-700 mb-4">
                    {{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p class="text-gray-700">{{ __('If you did not receive the email') }},
                <form class="inline-block" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="text-blue-500 hover:underline">
                        {{ __('click here to request another') }}
                    </button>.
                </form>
                </p>
            </div>
        </div>
    </div>


</x-layouts.auth>
