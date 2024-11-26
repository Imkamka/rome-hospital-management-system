<div class="p-6 bg-white rounded-lg">
    <h1 class="text-3xl font-bold mb-4">General</h1>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="consultation" class="block text-sm font-medium text-gray-700">Consultation For</label>
            <input type="text" id="consultation_for"
                class="mt-1 block py-2 px-4 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:model="form.consultation_for">
            <span class="text-red-500 text-sm">
                @error('form.consultation_for')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div>
            <label for="current_illness" class="block text-sm font-medium text-gray-700">Current Illness</label>
            <input type="text" id="current_illness"
                class="mt-1 block py-2 px-4 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:model="form.current_illness">
            <span class="text-red-500 text-sm">
                @error('form.current_illness')
                    {{ $message }}
                @enderror
            </span>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Vital Signs</label>
            <div class="bg-gray-100 p-4 rounded-md grid grid-cols-2 gap-4 ">
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" id="date"
                        class="mt-1 block py-2 px-4 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.date">
                    <span class="text-red-500 text-sm">
                        @error('form.date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                    <input type="time" id="time"
                        class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.time">
                    <span class="text-red-500 text-sm">
                        @error('form.time')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="heart_rate" class="block text-sm font-medium text-gray-700">Heart Rate (BPM)</label>
                    <input type="number" id="heart_rate"
                        class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.heart_rate">
                    <span class="text-red-500 text-sm">
                        @error('form.heart_rate')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="respiratory_rate" class="block text-sm font-medium text-gray-700">Respiratory Rate
                        (Min)</label>
                    <input type="number" id="respiratory_rate"
                        class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.respiratory_rate">
                    <span class="text-red-500 text-sm">
                        @error('form.respiratory_rate')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="bp" class="block text-sm font-medium text-gray-700">BP</label>
                    <input type="number" id="bp"
                        class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.bp">
                    <span class="text-red-500 text-sm">
                        @error('form.bp')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="temperature" class="block text-sm font-medium text-gray-700">Temperature
                        (°C)</label>
                    <input type="number" id="temperature" step="0.1"
                        class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.temperature">
                    <span class="text-red-500 text-sm">
                        @error('form.temperature')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="spo2" class="block text-sm font-medium text-gray-700">SPO2 Saturation
                        (%)</label>
                    <input type="number" id="spo2_saturation"
                        class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.spo2_saturation">
                    <span class="text-red-500 text-sm">
                        @error('form.spo2_saturation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="capillary_glucose" class="block text-sm font-medium text-gray-700">Capillary
                        Glucose</label>
                    <input type="number" id="capillary_glucose"
                        class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.capillary_glucose">
                    <span class="text-red-500 text-sm">
                        @error('form.capillary_glucose')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="system_review" class="block text-sm font-medium text-gray-700">System Review</label>
            <textarea id="system_review" rows="16"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:model="form.system_review"></textarea>
            <span class="text-red-500 text-sm">
                @error('form.system_review')
                    {{ $message }}
                @enderror
            </span>
        </div>
    </div>
</div>
