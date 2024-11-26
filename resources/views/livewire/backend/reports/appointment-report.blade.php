<div>
    <div class=" bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Appointment Records') }}</h2>
            <div class="mb-4 space-y-2">
                <label for="search" class="block text-gray-700">{{ __('From date') }}</label>
                <div class="flex ">
                    <input type="date" placeholder="{{ __('Ingrese el nombre completo del paciente') }}"
                        class="w-full border border-gray-300 p-2 rounded-md"
                        wire:model.live.debounce.500ms="from_date" />
                </div>
                <label for="search" class="block text-gray-700">{{ __('To date') }}</label>
                <div class="flex ">
                    <input type="date" placeholder="{{ __('Ingrese el nombre completo del paciente') }}"
                        class="w-full border border-gray-300 p-2 rounded-md" wire:model.live.debounce.500ms="to_date" />
                </div>
            </div>
            @if ($from_date && $to_date)
                <h3 class="text-xl font-semibold mt-8 text-center text-green-600">Appointment Report Between
                    "{{ $from_date }} to
                    {{ $to_date }}"</h3>
            @endif
            <div class="overflow-x-auto mt-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th>Appointment Number</th>
                            <th>Patient Name</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Creation Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($from_date && $to_date)
                            @forelse ($appointments as $ap)
                                <tr wire:key="{{ $ap->id }}" class="text-gray-700">
                                    <td class="border border-gray-300 p-2 text-center">{{ $ap->id ?? 'NA' }}</td>
                                    <td class="border border-gray-300 p-2">{{ $ap->patient->first_name }}</td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $ap->appointment_date }}</td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $ap->appointment_time }}</td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $ap->created_at }}</td>

                                    <td class="border border-gray-300 p-2 text-center text-green-600 font-medium">
                                        {{ $ap->status }}</td>
                                    <td class="border border-gray-300 p-2 text-center text-blue-600">
                                        <a wire:navigate href="{{ route('appointment.detail', $ap) }}"
                                            class="underline">{{ __('View') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border border-gray-300 p-4 text-center text-gray-500">
                                        No Result Found
                                    </td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
