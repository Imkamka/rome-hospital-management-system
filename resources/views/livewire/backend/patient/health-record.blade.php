<div>
    <div class=" bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Medical Records') }}</h2>
            <div class="mb-4">
                <label for="search" class="block text-gray-700">{{ __('Enter the Diagnosis, record number') }}</label>
                <div class="flex mt-2">
                    <input id="search" type="text" placeholder="{{ __('Enter the Diagnosis, record number') }}"
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
                            <th>Diagnosis</th>
                            <th>Reason for Visit</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($health_records as $record)
                            <tr wire:key="{{ $record->id }}" class="text-gray-700">
                                <td class="border border-gray-300 p-2">
                                    {{ $record->current_diagnosis ?? 'NA' }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center">
                                    {{ $record->reason_for_visit ?? 'NA' }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center">{{ $record->created_at }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center">{{ $record->status ?? 'NA' }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center text-green-600 font-medium">
                                    <a wire:navigate href="{{ route('patient.record-detail', $record) }}"
                                        class="px-6 py-1 rounded bg-blue-400 text-sm text-white">{{ __('More details') }}</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 p-4 text-center text-gray-500">
                                    No Data available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $health_records->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
