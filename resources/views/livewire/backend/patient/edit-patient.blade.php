<div>
    @if (session('success'))
        <div class="py-3">
            @include('includes._message')
        </div>
    @endif
    <form wire:submit.prevent="update({{ $patient->id }})">
        <div class="p-6  mx-auto bg-white rounded-xl shadow-md space-y-4">
            <h2 class="text-xl font-bold mb-4">{{ __('Manage Patient record') }}</h2>

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
                    <input type="text" placeholder="{{ __('Ingrese el numero de telefono') }}"
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
                        wire:model="email" disabled>
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
                        <option class="Female">{{ __('Female') }}</option>
                    </select>
                    @error('gender')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de nacimiento -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Age') }}</label>
                    <input type="text" wire:model="age"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Age">
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
                    <input wire:model="emergency_contact_phone" type="text"
                        placeholder="{{ __('Ingrese el numero de telefono') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('emergency_contact_phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Parentesco -->
                <div>
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('emergency_contact_relationship') }}</label>
                    <input wire:model="emergency_contact_relationship" type="text"
                        placeholder="{{ __('Ingrese el parentesco') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('emergency_contact_relationship')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Botón Crear -->
            <div class="mt-6 flex justify-end">
                <button
                    class="w-full md:w-auto bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-2 text-sm rounded-lg font-semibold focus:outline-none hover:from-purple-500 hover:to-blue-500">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
</div>
