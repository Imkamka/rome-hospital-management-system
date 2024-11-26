    <div class="flex flex-col md:flex-row w-full bg-white shadow-lg rounded-lg overflow-hidden " style="height: 100%">
        <!-- Left Side (Form Section) -->
        <div class="w-1/2 w-full p-8">
            <div class="flex flex-col justify-center h-full md:px-12">
                <!-- Logo -->
                <div class="flex justify-center">
                    <a wire:navigate href="{{ route('home.page') }}">
                        <img src="{{ asset('backend/assets/img/logo/logo.png') }}" alt="" width="200px"
                            height="40px" class="mb-12 flex justify-center">
                    </a>
                </div>
                <!-- Welcome Message -->
                <h2 class="text-2xl font-semibold text-gray-700">Bienvenido</h2>
                <h2 class="text-gray-600 mb-6 text-3xl font-bold">Sign Up</h2>

                <!-- Form -->
                <form wire:submit.prevent="signup" class="w-full space-y-6" enctype="multipart/form-data">
                    <div class="grid md:grid-cols-2 grid-col-1 gap-4">
                        <!-- First Name -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">First Name</label>
                            <input type="text" wire:model="first_name" class="border border-gray-300 rounded-lg p-2"
                                placeholder="First Name">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Last Name</label>
                            <input type="text" wire:model="last_name" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Last Name">
                            @error('last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-col-1 gap-4">

                        <!-- Email Address -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                            <input type="email" wire:model="email" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Email Address">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                            <input type="text" wire:model="username" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Username">
                            @error('username')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-col-1 gap-4">

                        <!-- Password -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                            <input type="password" wire:model="password" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Password">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mobile Number -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Mobile Number</label>
                            <input type="text" wire:model="phone" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Mobile Number">
                            @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-col-1 gap-4">

                        <!-- Gender -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Gender</label>
                            <select wire:model="gender" class="border border-gray-300 rounded-lg p-2">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Specialization</label>
                            <select wire:model="specialization" class="border border-gray-300 rounded-lg p-2">
                                <option value="">Select</option>
                                @forelse ($specs as $spec)
                                    <option value="{{ $spec->name }}">{{ $spec->name }}</option>
                                @empty
                                    <option value="Cardiology">No Specialization Added</option>
                                @endforelse
                            </select>
                            @error('specialization')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Mobile Number -->
                    <div class="flex flex-col">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Fees</label>
                        <input type="text" wire:model="fees" class="border border-gray-300 rounded-lg p-2"
                            placeholder="Fees">
                        @error('fees')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gray-400 text-white font-semibold py-2 rounded-lg hover:bg-gray-700 transition duration-200">Sign
                        Up</button>

                    <!-- Login Link -->
                    <div class="text-center text-gray-500 mt-4">
                        Already have an account?
                        <x-nav-link wire:navigate href="{{ route('login') }}"
                            class="text-blue-500 hover:underline">Login</x-nav-link>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-1/2 w-full h-64 md:h-auto bg-cover bg-center md:block hidden"
            style="background-image: url({{ asset('images/login.jpg') }});">
        </div>
    </div>
