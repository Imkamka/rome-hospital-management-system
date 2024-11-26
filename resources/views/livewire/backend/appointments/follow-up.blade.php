<div>
    @if (session('success'))
        @include('includes._message')
    @endif
    <div x-data="{ follow: false, selectedID: null }" class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Follow-Up Appointments</h2>

        <!-- Follow-Up Appointment Card -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Single Follow-Up Appointment -->
            @if ($appointments->isNotEmpty())
                @foreach ($appointments as $appointment)
                    <div wire:key="{{ $appointment->id }}"
                        class="bg-white border border-gray-200 rounded-lg shadow-lg p-5">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">
                                {{ $appointment->patient->first_name . ' ' . $appointment->patient->last_name }}</h3>
                            <span class="text-sm font-medium text-green-600">Follow-Up - {{ $appointment->id }}</span>
                        </div>

                        <!-- Appointment Details -->
                        <div class="text-gray-600 mb-4">
                            <p class="text-sm">
                                <strong>Follow-Up Date:</strong> <span
                                    class="text-gray-800">{{ $appointment->follow_up_date ?? 'NA' }}</span>
                            </p>
                            <p class="text-sm">
                                <strong>Notes:</strong> <span
                                    class="text-gray-800">{{ $appointment->follow_up_notes ?? 'NA' }}</span>
                            </p>
                        </div>

                        <div class="flex space-x-2">
                            <button @click="follow = true; selectedID= {{ $appointment->id }}"
                                class="flex-1 bg-blue-600
                        hover:bg-blue-700 text-white py-2 rounded-md text-sm font-medium">
                                Reschedule
                            </button>
                            <button wire:confirm="Change the Status" wire:click="isCompleted({{ $appointment }})"
                                class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded-md text-sm font-medium">
                                Mark Completed
                            </button>
                        </div>
                    </div>
                    <div x-show="follow" x-transition style="display: none"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                        @click="follow = false">
                        <div @click.stop class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">

                            <h3 class="text-lg font-bold mb-4">Reschedule Appointment <span x-text="selectedID"></span>
                            </h3>
                            <!-- Modal content -->
                            <form wire:submit.prevent="followUp(selectedID)">
                                <label class="block mb-2 text-sm font-medium text-gray-700">New Appointment Date</label>
                                <input wire:model="follow_up_date" type="date"
                                    class="w-full p-2 border border-gray-300 rounded-md ">
                                @error('follow_up_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                                <label class="block mb-2 text-sm font-medium text-gray-700 mt-4">Follow-up Note
                                    (Optional)
                                </label>
                                <textarea wire:model="follow_up_notes" class="w-full p-2 border border-gray-300 rounded-md " rows="4"
                                    placeholder="Add any additional notes for the follow-up..."></textarea>
                                @error('follow_up_notes')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                                <button @click="follow = false" type="button"
                                    class="mt-4 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md">
                                    Close
                                </button>
                                <button type="submit"
                                    class="mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-5">

                    <div class="text-gray-600 py-4 text-center">
                        <p class="text-sm">
                            <strong>No Appointments available:</strong> <span class="text-gray-800"></span>
                        </p>

                    </div>

                </div>
            @endif

        </div>
    </div>

</div>
