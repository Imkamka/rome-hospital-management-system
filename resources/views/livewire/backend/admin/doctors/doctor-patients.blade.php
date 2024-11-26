<div>
    <div class=" bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold mb-4">{{ __("Doctor's Patient List") }}</h2>
                <a wire:navigate href="{{ route('admin.doctors-list') }}"
                    class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">{{ __('Back to List') }}</a>
            </div>
            <div class="mb-4">
                <label for="search" class="block text-gray-700">{{ __('Search for patient with name') }}</label>
                <div class="flex mt-2">
                    <input id="search" type="text" placeholder="{{ __('Search') }}"
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
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Registered Date</th>
                            <th class="border border-gray-300 p-2">{{ __('Acción') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($patient_list->isNotEmpty())
                            @foreach ($patient_list as $list)
                                <tr wire:key="{{ $list->id ?? 'NA' }}" class="text-gray-700">
                                    <td class="border border-gray-300 p-2 text-center">{{ $loop->iteration ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2">
                                        {{ $list->first_name . ' ' . $list->last_name ?? 'NA' }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $list->patient->phone ?? 'NA' }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $list->email ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $list->created_at->format('d M, Y H:i') ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center text-blue-600 space-x-1">
                                        <a wire:navigate href="{{ route('patient.detail', $list) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline transition">{{ __('View Detail') }}</a>
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
                    {{ $patient_list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
