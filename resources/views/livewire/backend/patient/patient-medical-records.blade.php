<div>
    <div class=" bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <div class="flex justify-between items-center  mb-4">
                <h2 class="text-2xl font-semibold">{{ __('Lab Records') }}</h2>
            </div>
            <div class="mb-4">
                <label for="search" class="block text-gray-700">{{ __('Search by Record number') }}</label>
                <div class="flex mt-2">
                    <input id="search" type="text" placeholder="{{ __('File Number') }}"
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
                            <th class="border border-gray-300 p-2">{{ __('Record Number') }}</th>
                            <th class="border border-gray-300 p-2">{{ __('Doctor') }}</th>
                            <th class="border border-gray-300 p-2">{{ __('Creation date') }}</th>
                            <th class="border border-gray-300 p-2">{{ __('Acción') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($records as $list)
                            <tr class="text-gray-700" wire:key={{ $list->id }}>
                                <td class="border border-gray-300 p-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 p-2">{{ $list->record_number }}</td>
                                <td class="border border-gray-300 p-2 text-center">
                                    {{ $list->doctor->first_name . ' ' . $list->doctor->last_name }}
                                </td>
                                <td class="border border-gray-300 p-2 text-center">
                                    {{ $list->created_at->format('d M,Y') }}</td>
                                <td class="border border-gray-300 p-2 text-center text-blue-600">
                                    <a wire:navigate href="{{ route('patient.medical-record-detail', $list->id) }}"
                                        class="px-4 py-1 text-sm text-white text-normal bg-blue-400 hover:bg-blue-600 transition rounded">{{ __('View Detail') }}</a>
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
                <div>
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
