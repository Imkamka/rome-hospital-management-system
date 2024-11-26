<div>
    <button @click="isOpen = !isOpen"
        class="relative text-white bg-gray-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.084-1.64-5.65-4.5-6.32V4a1.5 1.5 0 10-3 0v.68C6.64 5.35 5 7.916 5 11v3.159c0 .538-.214 1.055-.595 1.436L3 17h5m6 0a3.001 3.001 0 01-6 0m6 0H9" />
        </svg>
        <!-- Notification Count -->
        @if ($unread > 0)
            <span x-show="{{ $unread > 0 }}"
                class="absolute top-0 right-0 inline-flex items-center justify-center w-2 h-2 text-xs font-bold text-white bg-red-500 rounded-full dark:bg-red-700"></span>
        @endif
    </button>
</div>
