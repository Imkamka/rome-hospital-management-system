<div>
    <form wire:submit.prevent="create">
        <div class="p-4 mx-auto bg-white rounded-xl shadow-md space-y-4">
            <h2 class="text-xl font-bold mb-4">{{ __('New record') }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nombre completo -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Full name') }}</label>
                    <input type="text" placeholder="{{ __('Ingrese el nombre completo del paciente') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        wire:model="full_name">
                    @error('full_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Dirección -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Address') }}</label>
                    <input type="text" placeholder="{{ __('Ingrese dirección') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        wire:model="address">
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Telefono -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Teléfono') }}</label>
                    <input type="number" placeholder="{{ __('Ingrese el numero de telefono') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        wire:model="phone">
                    @error('phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Correo electronico -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
                    <input type="email" placeholder="{{ __('Ingrese el correo electronico') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        wire:model="email">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Género -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Género') }}</label>
                    <select wire:model="gender"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>{{ __('Seleccionar') }}</option>
                        <option value="Male">{{ __('Male') }}</option>
                        <option value="Female">{{ __('Female') }}</option>
                    </select>
                    @error('gender')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de nacimiento -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Age') }}</label>
                    <input type="number" wire:model="age"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter patient age">
                    @error('age')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contacto de emergencia -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Emergency contact') }}</label>
                    <input wire:model="emergency_contact" type="text"
                        placeholder="{{ __('Ingrese el nombre de la persona') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('emergency_contact')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Teléfono de contacto de emergencia -->
                <div>
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('Emergency contact phone number') }}</label>
                    <input wire:model="emergency_contact_phone" type="number"
                        placeholder="{{ __('Ingrese el numero de telefono') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('emergency_contact_phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Parentesco -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Family') }}</label>
                    <input wire:model="emergency_contact_relationship" type="text"
                        placeholder="{{ __('Ingrese el parentesco') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('emergency_contact_relationship')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>
        <div class=" flex items-center justify-center bg-gray-100 mt-5">
            <div class="w-full  bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-xl font-bold mb-4">{{ __('Set Up Patient Profile') }}</h2>

                <!-- First Name -->
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                    <input type="text" id="first_name" wire:model="first_name"
                        class="w-full p-3 border rounded-lg @error('first_name') border-red-500 @enderror"
                        placeholder="John">
                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                    <input type="text" id="last_name" wire:model="last_name"
                        class="w-full p-3 border rounded-lg @error('last_name') border-red-500 @enderror"
                        placeholder="Doe">
                    @error('last_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" id="username" wire:model="username"
                        class="w-full p-3 border rounded-lg @error('username') border-red-500 @enderror"
                        placeholder="johndoe123">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" wire:model="password"
                        class="w-full p-3 border rounded-lg @error('password') border-red-500 @enderror"
                        placeholder="••••••••">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->

                <div class="mt-6 flex justify-end">
                    <button
                        class="w-full md:w-auto bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-lg font-semibold focus:outline-none hover:from-purple-500 hover:to-blue-500">
                        {{ __('Crear') }}
                    </button>
                </div>
    </form>
</div>
</div>

</div>
