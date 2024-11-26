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

                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Full Name</label>
                            <input type="text" wire:model="full_name" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Full Name">
                            @error('full_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                            <input type="email" wire:model="email" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Email Address">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-col-1 gap-4">

                        <!-- Username -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                            <input type="text" wire:model="username" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Username">
                            @error('username')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                            <input type="password" wire:model="password" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Password">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-col-1 gap-4">
                        <!-- Mobile Number -->
                        <div class="flex flex-col">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Mobile Number</label>
                            <input type="text" wire:model="phone" class="border border-gray-300 rounded-lg p-2"
                                placeholder="Mobile Number">
                            @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

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
                    </div>
                    <!-- Address -->
                    <div class="flex flex-col">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Address</label>
                        <textarea rows="3" wire:model="address" class="border border-gray-300 rounded-lg p-2" placeholder="Address"></textarea>
                        @error('address')
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
                        <x-nav-link href="{{ route('login') }}"
                            class="text-blue-500 hover:underline">Login</x-nav-link>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-1/2 w-full h-64 md:h-auto bg-cover bg-center md:block hidden"
            style="background-image: url({{ asset('images/login.jpg') }});">
        </div>
    </div>
