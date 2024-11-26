<div>
    <div class="container mx-auto p-8 bg-white shadow-md rounded-md mb-4">
        @if (session('message'))
            <div class="py-2 px-4 mb-4 w-full bg-green-300 rounded">
                <span class="text-sm text-gray-600 text-semibold">{{ session('message') }}</span>
            </div>
        @endif
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Doctors Detail') }}</h2>
            <button wire:click = "isUpdate"
                class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">
                {{ $isEditing ? 'Cancel' : 'Edit' }}
            </button>
        </div>
        @if (!$isEditing)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 space-y-2">
                <div class="flex flex-col">
                    <h2 class="font-semibold">Profile Picture</h2>
                    <img src="{{ asset('storage/images/' . $doctor->image) }}" class="w-32 h-32 object-cover" />
                </div>

                <div class="flex flex-col">
                    <h2 class="font-semibold">{{ __('Doctor Name') }}</h2>
                    <span class="text-gray-700">{{ $doctor->first_name . ' ' . $doctor->last_name ?? 'NA' }}</span>
                </div>

                <div class="flex flex-col">
                    <span class="font-semibold">Doctor Contact Number:</span>
                    <span class="text-gray-700">{{ $doctor->doctor->phone ?? 'NA' }}</span>
                </div>

                <div class="flex flex-col">
                    <span class="font-semibold">Email Address:</span>
                    <span class="text-gray-700 capitalize">{{ $doctor->email ?? 'NA' }}</span>
                </div>

                <div class="flex flex-col">
                    <span class="font-semibold">Doctor Specialization:</span>
                    <span class="text-gray-700">{{ $doctor->doctor->specialization ?? 'NA' }}</span>
                </div>

                <div class="flex flex-col">
                    <span class="font-semibold">Registered Date:</span>
                    <span class="text-gray-700">{{ $doctor->created_at->format('d M, Y H:i') ?? 'NA' }}</span>
                </div>

            </div>
        @else
            <div class="mx-auto bg-white p-6 rounded-lg ">

                <form wire:submit.prevent="update">
                    @if (!empty($image) && is_object($image) && method_exists($image, 'temporaryUrl'))
                        <img id="image-preview" src="{{ $image->temporaryUrl() }}" alt="Image Preview"
                            class="w-48 h-48 object-cover" />
                    @else
                        <img id="image-preview" src="{{ asset('storage/images/' . $doctor->image) }}"
                            alt="No Image Selected" class="w-48 h-48 object-cover" />
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload Image</label>
                            <input wire:model="image"
                                class="block py-2 px-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                type="file" />
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">First Name</label>
                            <input type="text" wire:model="first_name" placeholder="Dr. Smith"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Last Name</label>
                            <input type="text" wire:model="last_name" placeholder="Dr. Smith"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                            @error('last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Email Address</label>
                            <input type="email" wire:model="email" placeholder="doctor@example.com"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"
                                disabled>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Doctor Specialization</label>
                            <select wire:model="specialization"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="">Select Specialization</option>
                                @foreach ($dr_specializations as $specialization)
                                    <option value="{{ $specialization->name }}"
                                        {{ $specialization->name === $doctor->doctor->specialization ? 'selected' : '' }}>
                                        {{ $specialization->name }}</option>
                                @endforeach
                            </select>

                            @error('specialization')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Doctor Contact Number</label>
                            <input type="text" wire:model="phone" placeholder="123456799"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                            @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button wire:click="update"
                        class=" bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Save</button>
                </form>
            </div>
        @endif

        <div class="mt-6 flex justify-end">
            <a wire:navigate href="{{ route('admin.doctors-list') }}" class="text-blue-600 hover:underline">Back to
                List</a>
        </div>
    </div>
    {{--
    <div class="container mx-auto p-8 bg-white shadow-md rounded-md">
        <h2 class="text-lg font-semibold mb-4">{{ __('Profile Deactivation') }}</h2>
        <div class="flex flex-col space-y-2">
            <h3 class="font-normal text-sm text-gray-500">This will deactivate the Doctor's Account</h3>
            <button
                class="px-4 py-1 w-44 bg-red-400 hover:bg-red-500 text-white/10 transition rounded text-sm hover:text-white">Deactivate
                Account</button>
        </div>

    </div> --}}
</div>
