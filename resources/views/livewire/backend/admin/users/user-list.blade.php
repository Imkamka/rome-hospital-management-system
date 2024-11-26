<div>
    <div class=" bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold mb-4 text-gray-600">{{ __('Registered Patients List') }}</h2>
            </div>
            <div class="mb-4">
                <label for="search"
                    class="block text-sm font-semibold text-gray-500">{{ __('Search for Patient with Name') }}</label>
                <div class="flex mt-2">
                    <input id="search" type="text" placeholder="{{ __('Search') }}"
                        class="w-full border border-gray-300 p-2 rounded-md" wire:model.live.debounce.500ms="search" />
                </div>
            </div>
            @if ($search)
                <h3 class="text-lg font-semibold mt-8 bg-green-300 rounded text-gray-800 p-3">Searching for
                    "{{ $search }}"</h3>
            @endif
            <div class=" overflow-x-auto  sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-2">{{ __('#') }}</th>
                            <th>Full Name</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Registered Date</th>
                            <th class="border border-gray-300 p-2">{{ __('Acción') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isNotEmpty())
                            @foreach ($users as $list)
                                <tr wire:key="{{ $list->id ?? 'NA' }}"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="border border-gray-300 p-2 text-center">{{ $loop->iteration ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2">
                                        {{ $list->full_name ?? $list->first_name . ' ' . $list->last_name }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $list->patient->phone ?? 'NA' }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $list->email ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $list->created_at->format('d M, Y H:i') ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center text-blue-600 space-x-1 ">
                                        <div
                                            class="flex md:flex-row space-x-2 md:items-center md:justify-center flex-col space-y-2 md:space-y-0">
                                            <a wire:navigate href="{{ route('admin.user-appointment', $list) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Appointment') }}</a>
                                            <a wire:navigate href="{{ route('admin.patient-record', $list) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Records') }}</a>
                                            <a wire:navigate href="{{ route('patient.edit', $list) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                                            <button wire:confirm= "Are you sure? You want to delete it."
                                                wire:click= "delete({{ $list->id }})"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Delete') }}</button>
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
