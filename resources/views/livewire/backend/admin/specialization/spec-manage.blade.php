<div>
    <div class="bg-gray-50 p-6 shadow rounded-md">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-600">{{ __('Specialization List') }}</h2>
            <a wire:navigate href="{{ route('admin.spec-create') }}"
                class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">{{ __('New') }}</a>
        </div>
        <div class="mb-4">
            <label for="search" class="block text-gray-700">{{ __('Search for Specialization by name') }}</label>
            <div class="flex mt-2">
                <input id="search" type="text" placeholder="{{ __('Search') }}"
                    class="w-full border border-gray-300 p-2 rounded-md" wire:model.live.debounce.500ms="search" />
            </div>
        </div>
        @if ($search)
            <h3 class="text-lg  font-semibold mt-8 bg-green-300 rounded text-gray-600 p-3">Searching for
                "{{ $search }}"</h3>
        @endif
        <div class="overflow-x-auto  sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('#') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Added Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if ($specializations->isNotEmpty())
                        @foreach ($specializations as $spec)
                            <tr wire:key="{{ $spec->id }}"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration ?? 'NA' }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $spec->name ?? 'NA' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $spec->created_at->format('d M, Y H:i') ?? 'NA' }}
                                </td>
                                <td class="px-6 py-4 text-right space-y-2 space-x-4">
                                    <a wire:navigate href="{{ route('admin.spec-edit', $spec->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline transition">{{ __('Edit') }}</a>
                                    <button wire:confirm="Are you sure? You want to delete it"
                                        wire:click = "delete({{ $spec->id }})"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline transition">{{ __('Delete') }}</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="border border-gray-300 p-4 text-center text-gray-500">
                                No Specialization Available
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="mt-3">
                {{ $specializations->links() }}
            </div>
        </div>
    </div>

</div>
