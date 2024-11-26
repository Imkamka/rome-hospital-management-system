<div>
    @if (session('success'))
        @include('includes._message')
    @endif
    <form wire:submit.prevent="update">
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-xl font-semibold mb-6">Change Password</h4>
                <div class="flex items-center space-x-4">
                    <label for="current-password" class="w-1/3 text-sm font-medium text-gray-700">Current
                        Password</label>
                    <div class="w-2/3">
                        <input type="text" wire:model="current_password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('current_password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center space-x-4 mt-4">
                    <label for="new-password" class="w-1/3 text-sm font-medium text-gray-700">New Password</label>
                    <div class="w-2/3">
                        <input type="password" wire:model="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center space-x-4 mt-4">
                    <label for="new-password" class="w-1/3 text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <div class="w-2/3">
                        <input type="password" wire:model="password_confirmation"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-right mt-6">
                    <button
                        class="inline-flex justify-center py-1 px-6 border border-transparent rounded-md shadow-sm  font-medium text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Change
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
