<div>
    <div class=" bg-gray-100 ">

        <div class="bg-white p-6 shadow rounded-md">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Patient Records') }}</h2>
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
                <h3 class="text-xl font-semibold mt-8 text-center text-green-600">Patient Report Between
                    "{{ $from_date }} to
                    {{ $to_date }}"</h3>
            @endif

            <div class="overflow-x-auto mt-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th>Patient Number</th>
                            <th>Patient Name</th>
                            <th>Patient Contact Number</th>
                            <th>Patient Gender</th>
                            <th>Creation Time</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($from_date && $to_date)
                            @forelse($patients as $patient)
                                <tr class="text-gray-700">
                                    <td class="border border-gray-300 p-2 text-center">{{ $patient->id ?? 'NA' }}</td>
                                    <td class="border border-gray-300 p-2">
                                        {{ $patient->patient->full_name ?? $patient->first_name }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $patient->patient->phone ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $patient->patient->gender ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $patient->created_at }}</td>
                                    <td class="border border-gray-300 p-2 text-center text-blue-600 space-x-2">
                                        <div
                                            class="flex md:flex-row space-x-2 md:items-center md:justify-center flex-col space-y-2 md:space-y-0">
                                            <a wire:navigate href="{{ route('patient.edit', $patient) }}"
                                                class="underline">{{ __('Edit') }}</a>
                                            <a wire:navigate href="{{ route('patient.detail', $patient) }}"
                                                class="underline text-green-400">{{ __('View') }}</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border border-gray-300 p-4 text-center text-gray-500">
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
