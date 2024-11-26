<div>
    <div class="container mx-auto p-8 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-semibold mb-4">{{ __('Medical Records') }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col">
                <h2 class="font-semibold">{{ __('Diagnosis:') }}</h2>
                <span class="text-gray-700">{{ $record->current_diagnosis }}</span>
            </div>

            <div class="flex flex-col">
                <span class="font-semibold">Reason for visit:</span>
                <span class="text-gray-700">{{ $record->reason_for_visit ?? 'NA' }}</span>
            </div>

            <div class="flex flex-col">
                <span class="font-semibold">Treatment Plan:</span>
                <span class="text-gray-700 capitalize">{{ $record->treatment_plans ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Prescriptions:</span>
                <span class="text-gray-700">{{ $record->prescription ?? 'NA' }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Prescription Date:</span>
                <span class="text-gray-700">{{ $record->prescription_date ?? 'NA' }}</span>
            </div>

        </div>

        <div class="mt-6 flex justify-end">
            <a wire:navigate href="{{ route('patient.health-records') }}" class="text-blue-600 hover:underline">Back to
                List</a>
        </div>

    </div>
</div>
