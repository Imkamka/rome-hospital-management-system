<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Diagnostics</h1>

    <!-- General Input -->
    <div class="mb-5">
        <label for="general" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">General</label>
        <input type="text" id="general" wire:model="form.general" name="general"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Enter general diagnostic details" />
        @error('form.general')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <!-- Facial Input -->
    <div class="mb-5">
        <label for="facial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Facial</label>
        <input type="text" id="facial" wire:model="form.facial" name="facial"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Enter facial diagnostic details" />
        @error('form.facial')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <!-- Dermatological Facial Input -->
    <div class="mb-5">
        <label for="dermatological_facial"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dermatological Facial</label>
        <input type="text" id="dermatological_facial" wire:model="form.dermatological_facial"
            name="dermatological_facial"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Enter dermatological facial diagnostic details" />
        @error('form.dermatological_facial')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <!-- Physiotherapy Input -->
    <div class="mb-5">
        <label for="physiotherapy"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Physiotherapy</label>
        <input type="text" id="physiotherapy" wire:model="form.physiotherapy" name="physiotherapy"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Enter physiotherapy diagnostic details" />
        @error('form.physiotherapy')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>
