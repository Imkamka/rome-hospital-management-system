<div>
    <div class="bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <div class="flex justify-between items-center  mb-4">
                <h2 class="text-2xl font-semibold">{{ __('Patient Records') }}</h2>
                <a wire:navigate href="{{ route('patient.create') }}"
                    class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">{{ __('New') }}</a>
            </div>
            <div class="mb-4">
                <label for="search"
                    class="block text-gray-700">{{ __('Ingrese el nombre, numero de documento o expediente') }}</label>
                <div class="flex mt-2">
                    <input id="search" type="text"
                        placeholder="{{ __('Ingrese el nombre completo del paciente') }}"
                        class="w-full border border-gray-300 p-2 rounded-md" wire:model.live.debounce.500ms="search" />
                </div>
            </div>
            @if ($search)
                <h3 class="text-xl font-semibold mt-8 bg-green-300 rounded text-gray-800 p-3">Searching for
                    "{{ $search }}"</h3>
            @endif
            <div class="overflow-x-auto mt-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-2">{{ __('#') }}</th>
                            <th>Patient Name</th>
                            <th>Patient Contact Number</th>
                            <th>Patient Gender</th>
                            <th>Creation Date</th>
                            <th class="border border-gray-300 p-2">{{ __('Acción') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                                <tr wire:key="{{ $user->id }}" class="text-gray-700">
                                    <td class="border border-gray-300 p-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 p-2">{{ $user->patient->full_name }}</td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $user->patient->phone }}</td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $user->patient->gender }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $user->patient->created_at }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center text-blue-600 space-x-1">
                                        <div
                                            class="flex md:flex-row space-x-2 md:items-center md:justify-center flex-col space-y-2 md:space-y-0">
                                            <a wire:navigate href="{{ route('patient.edit', $user) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                                            <a wire:navigate href="{{ route('patient.detail', $user) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('View') }}</a>
                                            <a wire:navigate href="{{ route('record.create', $user) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('New Record') }}</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="border border-gray-300 p-4 text-center text-gray-500">
                                    No Data available
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
