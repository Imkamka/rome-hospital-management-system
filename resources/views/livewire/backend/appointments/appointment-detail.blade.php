<div>
    <div class="container mx-auto p-8 bg-white shadow-md rounded-md">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Appointment Record') }}</h2>
            @can('isAdmin', auth()->user())
                <a wire:navigate href="{{ route('admin.doctors-list') }}"
                    class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">{{ __('Back to List') }}</a>
            @endcan

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col">
                <h2 class="font-semibold">{{ __('Patient Name:') }}</h2>
                <span class="text-gray-700">{{ $appointment->patient->first_name }}</span>
            </div>

            <div class="flex flex-col">
                <span class="font-semibold">Contact Number:</span>
                <span class="text-gray-700">{{ $appointment->patient->phone ?? 'NA' }}</span>
            </div>

            <div class="flex flex-col">
                <span class="font-semibold">Gender:</span>
                <span class="text-gray-700 capitalize">{{ $appointment->patient->gender ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Email Address:</span>
                <span class="text-gray-700">{{ $appointment->patient->email ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Address:</span>
                <span class="text-gray-700">{{ $appointment->patient->address ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Appointment Date:</span>
                <span class="text-gray-700">{{ $appointment->appointment_date ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Appointment Time:</span>
                <span class="text-gray-700">{{ $appointment->appointment_time ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Status:</span>
                <span class="text-gray-700">{{ $appointment->status ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Created date:</span>
                <span class="text-gray-700">{{ $appointment->created_at ?? 'NA' }}</span>
            </div>

        </div>
        @can('isDoctor', auth()->user())
            <div class="mt-6 flex justify-end">
                <a wire:navigate href="{{ route('appointment.all') }}" class="text-blue-600 hover:underline">Back to
                    Appointment
                    List</a>
            </div>
        @endcan
    </div>

    @can('isDoctor', auth()->user())
        <div class="container mx-auto py-4 rounded-md">
            <div class="bg-white shadow-lg rounded-lg p-6 ">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-semibold mb-4">{{ __('Appointment Status Update') }}</h2>
                    <div>
                        @if ($isEditing)
                            <button wire:click="isCancel"
                                class="px-4 py-2 rounded bg-green-300 text-sm text-white">{{ __('X') }}</button>
                        @else
                            <button wire:click="isUpdate"
                                class="px-4 py-2 rounded bg-blue-500 text-sm text-white">{{ __('Action') }}</button>
                        @endif
                    </div>
                </div>
                @if ($isEditing)
                    <form wire:submit.prevent="updateStatus({{ $appointment->id }})">
                        <div class="mt-2 grid md:grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-3">
                                <label for="about" class="block text-sm/6 font-medium text-gray-900">Remark</label>
                                <div class="mt-2">
                                    <textarea id="about" wire:model="remark" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset  sm:text-sm/6"></textarea>
                                </div>
                                <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the status.</p>
                                @error('remark')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="country" class="block text-sm/6 font-medium text-gray-900">status
                                </label>
                                <div class="mt-2">
                                    <select wire:model="status" name="status" autocomplete="status-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                                        <option value="">Status</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Follow-Up">Follow Up</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                    @error('status')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="mt-2 flex justify-end">
                            <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-sm text-white">Update</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endcan
</div>
