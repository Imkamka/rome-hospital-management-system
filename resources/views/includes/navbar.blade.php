<nav x-data="{ xsign: false }" class="bg-white text-gray-800 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <a wire:navigate href="{{ route('home.page') }}" class="text-2xl font-bold"><span class="text-red-500">ROMA</span>
            - Hospital Management</a>
        <ul class="hidden md:flex space-x-6">
            <li><a wire:navigate href="{{ route('home.page') }}"
                    class="inline-flex w-full justify-center  rounded-md py-2  font-semibold text-gray-700 {{ Route::is('home.page') ? 'text-blue-600' : '' }} transition-colors hover:text-blue-600">Home</a>
            </li>
            <li><a wire:navigate href="{{ route('doctor.page') }}"
                    class="inline-flex w-full justify-center  rounded-md py-2  font-semibold text-gray-700 {{ Route::is('doctor.page') || Route::is('doctor.view') ? 'text-blue-600' : '' }} transition-colors hover:text-blue-600">Doctors</a>
            </li>
            <li><a wire:navigate href="{{ route('about.page') }}"
                    class="{{ Route::is('about.page') ? 'text-blue-600' : '' }} transition-colors inline-flex w-full justify-center  rounded-md py-2  font-semibold text-gray-700 hover:text-blue-600">About</a>
            </li>
            <li><a wire:navigate href="{{ route('contact.page') }}"
                    class="{{ Route::is('contact.page') ? 'text-blue-600' : '' }} transition-colors inline-flex w-full justify-center  rounded-md py-2  font-semibold text-gray-700 hover:text-blue-600">Contact</a>
            </li>
            <li>
                <div class="h-5 mt-2.5 border-l border-gray-300"></div>
            </li>
            <li><a wire:navigate href="{{ route('login') }}"
                    class="inline-flex w-full justify-center  rounded-md py-2  font-semibold text-gray-700 hover:text-blue-600">Login</a>
            </li>

            <li>
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <!-- Button -->
                    <div>
                        <button type="button" @click="open = !open"
                            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Sign Up
                        </button>
                    </div>

                    <!-- Dropdown Menu -->
                    <div style="display:none" x-show="open" @click.away="open = false"
                        class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                        x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a wire:navigate href="{{ route('doctor.register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900 transition-colors"
                                role="menuitem" tabindex="-1" id="menu-item-0">As Doctor</a>
                            <a wire:navigate href="{{ route('patient.register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900 transition-colors"
                                role="menuitem" tabindex="-1" id="menu-item-1">As Patient</a>
                        </div>
                    </div>
                </div>


            </li>
        </ul>
        <button class="md:hidden text-2xl" id="mobile-menu-button">☰</button>
    </div>
    <ul id="mobile-menu"
        class="hidden bg-gray-800 text-white space-y-4 px-6 py-4 md:hidden transition-all duration-300 ease-in-out">
        <li>
            <a class="hover:bg-gray-400 transition rounded p-2 block hover:text-white text-gray-300" wire:navigate
                href="{{ route('home.page') }}">Home</a>
        </li>
        <li><a wire:navigate
                class="hover:bg-gray-400 {{ Route::is('doctor.page') ? 'bg-gray-400 text-white' : 'text-gray-300' }} transition rounded p-2 block hover:text-white "
                href="{{ route('doctor.page') }}" class="hover:text-gray-300">Doctors</a></li>
        <li><a wire:navigate class="hover:bg-gray-400 transition rounded p-2 block hover:text-white text-gray-300"
                href="{{ route('about.page') }}" class="hover:text-gray-300">About</a></li>
        <li><a wire:navigate class="hover:bg-gray-400 transition rounded p-2 block hover:text-white text-gray-300"
                href="{{ route('contact.page') }}" class="hover:text-gray-300">Contact</a></li>
        <li><a wire:navigate class="hover:bg-gray-400 transition rounded p-2 block hover:text-white text-gray-300"
                href="{{ route('login') }}" class="hover:text-gray-300">Admin Login</a></li>
        <li><a wire:navigate class="hover:bg-gray-400 transition rounded p-2 block hover:text-white text-gray-300"
                href="{{ route('login') }}" class="hover:text-gray-300">Login</a></li>
        <li><a wire:navigate class="hover:bg-gray-400 transition rounded p-2 block hover:text-white text-gray-300"
                href="{{ route('doctor.register') }}" class="hover:text-gray-300">Signup as Doctor</a>
        </li>
        <li><a wire:navigate class="hover:bg-gray-400 transition rounded p-2 block hover:text-white text-gray-300"
                href="{{ route('patient.register') }}" class="hover:text-gray-300">Signup as
                Patient</a>
        </li>
    </ul>
</nav>


{{-- <header>

    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a wire:navigate class="navbar-brand" href="{{ route('home.page') }}">
                <h3>Hospital <span class="text-danger">Management</span></h3>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <x-nav-link class="nav-link" href="{{ route('home.page') }}">Home</x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link href="{{ route('login') }}">Admin</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('doctor.register') }}">Doctor Signup</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('login') }}">Doctor Login</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('patient.register') }}">Patient Register</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('doctor.page') }}">Doctors</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" href="{{ route('about.page') }}">About</x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link class="nav-link" href="{{ route('contact.page') }}">Contact</x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header> --}}
