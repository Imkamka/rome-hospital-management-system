<div>
    @if (session('success'))
        @include('includes._message')
    @endif
    <form wire:submit.prevent="update">
        <div class="bg-white p-6 rounded-lg shadow-md space-y-2">
            <h3 class="text-xl font-medium mb-6">Profile Information</h3>
            <div class="space-y-2">
                <div class="flex items-center space-x-4 w-full ">
                    <div class="flex flex-col w-full">
                        @if ($image)
                            <!-- Show preview when the image is selected -->
                            <img id="image-preview" src="{{ $image->temporaryUrl() }}" alt="Image Preview"
                                class="w-48 h-48 object-cover rounded-md" />
                        @else
                            <!-- Show default image or placeholder if no image is selected -->
                            <img id="image-preview" src="{{ asset('storage/images/' . auth()->user()->image) }}"
                                alt="No Image Selected" class="w-48 h-48 object-cover rounded-md" />
                        @endif
                        <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload Image</label>
                            <input wire:model="image"
                                class="block py-2 px-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file">
                            <div style="display: none" x-show="uploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>

                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            wire:model="first_name">
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            wire:model="last_name">
                        @error('last_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            type="email" wire:model="email" readonly>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            wire:model="username" readonly>
                    </div>
                </div>
                @if (auth()->user()->role !== 'Admin')
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" wire:model="bio" placeholder="Write something about yourself..."
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('bio') border-red-500 @enderror"></textarea>
                        @error('bio')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                @endif
            </div>

        </div>
        <div class="text-right mt-6">
            <button
                class="inline-flex justify-center py-2 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
            </button>
        </div>
</div>

</div>
</form>
</div>
