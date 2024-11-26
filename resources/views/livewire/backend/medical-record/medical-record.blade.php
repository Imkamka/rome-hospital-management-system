<div>
    <form wire:submit.prevent="updateRecord({{ $patient_id }})">
        <div class="space-y-6">
            <div class="card-box p-6">
                <div class="space-y-6">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Date:</label>
                            <input type="date"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                wire:model="prescription_date">
                            @error('prescription_date')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Reason for visit:</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                wire:model="reason_for_visit">
                            @error('reason_for_visit')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-1">
                            <label for="status" class="block text-sm/6 font-medium text-gray-900">Status</label>
                            <select wire:model="status" name="status" autocomplete="status-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                                <option>Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Resolved">Resolved</option>
                            </select>
                            @error('status')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Diagnosis:</label>
                            <textarea rows="5"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                wire:model="current_diagnosis"></textarea>
                            @error('current_diagnosis')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Prescription:</label>
                            <textarea rows="5"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                wire:model="prescription"></textarea>
                            @error('prescription')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-full">
                            <label class="block text-sm font-medium text-gray-700">Treatment Plans(Optional):</label>
                            <textarea rows="5"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                wire:model="treatment_plans"></textarea>
                            @error('treatment_plans')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer w-full flex justify-end">
                        <button type="submit"
                            class="inline-flex  justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Update
                        </button>
                    </div>
                </div>

            </div>
    </form>
</div>
