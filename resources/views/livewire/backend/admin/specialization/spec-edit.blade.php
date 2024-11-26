<div>
    <div class="container  bg-white p-6 rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold ">{{ __('Update Specialization') }}</h2>
            <a wire:navigate href="{{ route('admin.spec-manage') }}"
                class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">Manage
            </a>
        </div>
        <form wire:submit.prevent="update">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Specialization</label>
                <input type="text" wire:model="name" placeholder="ENT"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end">
                <button
                    class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>
