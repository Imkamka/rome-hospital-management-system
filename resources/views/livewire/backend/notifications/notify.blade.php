<div>
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="">
            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 22 22">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z" />
            </svg>
            @if ($unread > 0)
                <span x-show="{{ $unread > 0 }}"
                    class="absolute top-0 right-0 inline-flex items-center justify-center w-2 h-2 text-xs font-bold text-white bg-red-500 rounded-full dark:bg-red-700"></span>
            @endif
        </button>

        <!-- Dropdown menu -->
        <div x-show="open" @click.outside="open = false" style="display: none"
            class="absolute right-0 z-50  p-4 bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700">
            <ul class="text-sm text-gray-700 dark:text-gray-200 max-h-60 overflow-y-auto">
                <div class="mb-3">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                        Notifications({{ auth()->user()->notifications->whereNull('read_at')->count() }})</h3>
                </div>
                @forelse ($notifications as $list)
                    <div wire:key="{{ $list->id }}">
                        <li wire:click="markAsReadAp({{ $list }})"
                            class="p-4 cursor-pointer mb-2 bg-gray-100 hover:bg-gray-200 rounded-md {{ $list->read_at === null ? 'font-semibold text-blue-500 bg-gray-300 ' : 'text-gray-700' }}">
                            <p class="text-sm font-medium w-full">
                                {{ auth()->user()->role === 'Doctor' ? $list->data['message'] : 'Your appointment has been updated: ' . $list->data['remark'] }}

                            </p>
                            <p class="text-xs text-gray-500 ">
                                {{ $list->created_at->diffForHumans() }}
                            </p>
                        </li>
                    </div>
                @empty
                    <li class="p-4 mx-auto rounded-md">
                        <p class="text-sm text-gray-600 font-medium w-full">No recent updates available</p>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
