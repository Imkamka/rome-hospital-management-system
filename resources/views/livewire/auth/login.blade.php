    <div class="flex flex-col md:flex-row w-full bg-white shadow-lg rounded-lg overflow-hidden" style="height: 100%">
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
                <h2 class="text-gray-600 mb-6 text-3xl font-bold">Inicia sesión</h2>

                <!-- Form -->
                <form wire:submit="login">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">Correo
                            electrónico</label>
                        <input type="email" wire:model="email" placeholder="Ingresa tu correo electrónico"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Contraseña</label>
                        <input type="password" wire:model="password" placeholder="Contraseña"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" class="text-gray-600">
                            <span class="ml-2 text-gray-600 text-sm">Recuérdame</span>
                        </label>
                        <a wire:navigate href="{{ route('forgot-password') }}"
                            class="text-sm text-blue-600 hover:underline">Olvidé mi
                            contraseña</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-gray-400 text-white font-semibold py-2 rounded-lg hover:bg-gray-700 transition duration-200">Sign
                        In</button>
                </form>
            </div>
        </div>

        <div class="w-1/2 w-full h-64 md:h-auto bg-cover bg-center md:block hidden"
            style="background-image: url({{ asset('images/login.jpg') }});">
        </div>
    </div>
