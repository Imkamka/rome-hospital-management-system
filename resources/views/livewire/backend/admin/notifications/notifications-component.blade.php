<div>
    <div class="p-4">
        <!-- Notifications List -->
        <div class="bg-white shadow-md rounded-lg  w-full">
            <ul>
                @forelse ($notifications as $unread)
                    @php
                        $user = \App\Models\User::find($unread->data['user_id']);
                    @endphp
                    <div wire:key="{{ $unread->id }}">
                        <li wire:click="markAsRead({{ $unread }})"
                            class="p-4 cursor-pointer mb-2 bg-gray-100 hover:bg-gray-200 rounded-md {{ $unread->read_at === null ? 'font-semibold text-blue-500 bg-gray-300 ' : 'text-gray-700' }}">
                            <p class="text-sm font-medium w-full">
                                {{ $unread->data['message'] }}
                            </p>
                            <p class="text-xs text-gray-500 ">
                                {{ $unread->created_at->diffForHumans() }}
                            </p>
                        </li>
                    </div>
                @empty
                    <p class="text-sm text-gray-700 text-center py-2 px-4">
                        No recent updates
                    </p>
                @endforelse
            </ul>
        </div>
    </div>

</div>
