<div>
    <div class="container mx-auto ">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Assign Appointments</h2>
        @if (session('success'))
            @include('includes._message')
        @endif
        <div class="bg-white p-6 rounded-lg shadow-md">

            <form wire:submit.prevent="assign" class="space-y-6">
                <label for="patient_id" class="block text-sm font-medium text-gray-700">Select Patient:</label>
                <select wire:model="patient_id"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select a patient</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->patient->full_name }}</option>
                    @endforeach
                </select>
                @error('patient_id')
                    <p class="text-red-500 text-xs ">{{ $message }}</p>
                @enderror

                <label for="appointment_date" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" wire:model="appointment_date"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                @error('appointment_date')
                    <p class="text-red-500 text-xs ">{{ $message }}</p>
                @enderror

                <label for="appointment_time" class="block text-sm font-medium text-gray-700">Time:</label>
                <input id="appointment_time" type="text" wire:model="appointment_time"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="12:00 PM">
                @error('appointment_time')
                    <p class="text-red-500 text-xs ">{{ $message }}</p>
                @enderror

                <label for="remark" class="block text-sm font-medium text-gray-700">Remarks:</label>
                <textarea wire:model="remark" rows="3"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                @error('remark')
                    <p class="text-red-500 text-xs ">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Assign Appointment
                </button>
            </form>

        </div>
    </div>
</div>
