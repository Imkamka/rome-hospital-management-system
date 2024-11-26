<div id="create" data-id="{{ $this->getId() }}">
    @if (session('success'))
        @include('includes._message')
    @endif
    <div class="p-6  mx-auto bg-white rounded-xl shadow-md space-y-4">
        <h2 class="text-xl font-bold mb-4">{{ __('New Appointment record') }}</h2>
        <form wire:submit.prevent="create">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nombre completo -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Specialization') }}</label>
                    <select wire:model="specialization"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>{{ __('Seleccionar') }}</option>
                        @foreach ($specs as $spec)
                            <option value="{{ $spec->name }}">{{ $spec->name }}</option>
                        @endforeach
                    </select>
                    @error('specialization')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Doctor') }}</label>
                    <select wire:model="doctor_id"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>{{ __('Seleccionar') }}</option>
                        @foreach ($doctors as $dr)
                            <option value="{{ $dr->id }}">{{ $dr->username }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Date') }}</label>
                    <input type="date"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        wire:model="appointment_date">
                    @error('appointment_date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Time') }}</label>
                    <input id="appointment_time" type="text"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        wire:model="appointment_time" placeholder="10:00 AM">
                    @error('appointment_time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Additional message') }}</label>
                    <textarea wire:model="message"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </textarea>
                    @error('message')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <!-- Botón Crear -->
            <div class="mt-6 flex justify-end">
                <button
                    class="w-full md:w-auto bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-2 rounded-lg font-semibold focus:outline-none hover:from-purple-500 hover:to-blue-500">
                    {{ __('Crear') }}
                </button>
            </div>
        </form>
    </div>
