<div>
    <div class=" bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Appointments History') }}</h2>
            <div class="mb-4">
                <label for="search"
                    class="block text-gray-700">{{ __('Ingrese el nombre, numero de documento o expediente') }}</label>
                <div class="flex mt-2">
                    <input id="search" type="text" placeholder="{{ __('Ingrese el nombre completo del paciente') }}"
                        class="w-full border border-gray-300 p-2 rounded-md" wire:model.live.debounce.500ms="search" />
                </div>
            </div>

            @if ($search)
                <h3 class="text-xl font-semibold mt-8 bg-green-300 rounded text-gray-800 p-3">Result found for
                    "{{ $search }}"</h3>
            @endif
            <div class="overflow-x-auto mt-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th>Appointment Number</th>
                            <th>Doctor Name</th>
                            <th>Date of Appointment</th>
                            <th>Time of Appointment</th>
                            <th>Status</th>
                            <th class="border border-gray-300 p-2">{{ __('Acción') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $appointment)
                            <tr wire:key="{{ $appointment->id }}" class="text-gray-700">
                                <td class="border border-gray-300 p-2 text-center">{{ $loop->iteration ?? 'NA' }}</td>
                                <td class="border border-gray-300 p-2">
                                    {{ $appointment->doctor->first_name . '' . $appointment->doctor->last_name }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center">{{ $appointment->appointment_date }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center">{{ $appointment->appointment_time }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center text-green-600 font-medium">
                                    {{ $appointment->status }}</td>
                                <td class="border border-gray-300 p-2 text-center text-blue-600">
                                    @if ($appointment->status === 'Pending')
                                        <button wire:click="cancel({{ $appointment }})" type="submit"
                                            class="px-6 py-1 rounded bg-blue-400 text-xs text-white"
                                            {{ $appointment->status !== 'Pending' ? 'disabled' : '' }}>{{ __('Cancel') }}</button>
                                    @else
                                        <p class="px-2 py-1 rounded  text-sm "
                                            {{ $appointment->status !== 'Pending' ? 'disabled' : '' }}>
                                            {{ __('Cannot Cancel') }}</p>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border border-gray-300 p-4 text-center text-gray-500">
                                    No Appointments available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
