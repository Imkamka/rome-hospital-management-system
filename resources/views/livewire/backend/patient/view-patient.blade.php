<div x-data="{ editProfile: false }">
    <div class="container mx-auto p-8 bg-white shadow-md rounded-md">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Patient Record') }}</h2>
            @can('isAdmin', auth()->user())
                <a wire:navigate href="{{ route('admin.doctors-list') }}"
                    class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">{{ __('Back to List') }}</a>
            @endcan

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col">
                <h2 class="font-semibold">{{ __('Patient Name:') }}</h2>
                <span class="text-gray-700">{{ $patient->patient->full_name }}</span>
            </div>

            <div class="flex flex-col">
                <span class="font-semibold">Contact Number:</span>
                <span class="text-gray-700">{{ $patient->patient->phone }}</span>
            </div>

            <div class="flex flex-col">
                <span class="font-semibold">Gender:</span>
                <span class="text-gray-700 capitalize">{{ $patient->patient->gender }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Email Address:</span>
                <span class="text-gray-700">{{ $patient->email }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Age:</span>
                <span class="text-gray-700">{{ $patient->patient->age }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Address:</span>
                <span class="text-gray-700">{{ $patient->patient->address }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Creation Date:</span>
                <span class="text-gray-700">{{ $patient->patient->created_at->format('Y-m-d H:i:s') }}</span>
            </div>
        </div>
        @can('isDoctor', auth()->user())
            <div class="mt-6 flex justify-end">
                <a wire:navigate href="{{ route('patient.manage') }}" class="text-blue-600 hover:underline">Back to Patient
                    List</a>
            </div>
        @endcan

    </div>

    @if (session('success'))
        <div class="mt-3">
            @include('includes._message')
        </div>
    @endif
    @can('isDoctor', auth()->user())
        <div class="container mx-auto py-4 rounded-md">
            <div class="bg-white shadow-lg rounded-lg p-6 ">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-semibold mb-4">{{ __('Medical History') }}</h2>
                    <div>
                        @if ($isEditing)
                            <button wire:click="isCancel"
                                class="px-4 py-1 rounded bg-green-300 text-sm text-white">{{ __('Cancel') }}</button>
                        @else
                            <button wire:click="isEdit"
                                class="px-4 py-1 rounded bg-blue-400 text-sm text-white">{{ __('Add Medical History') }}</button>
                        @endif
                    </div>
                </div>
                @if (!$isEditing)
                    <h3 class="text-xl font-semibold mt-6 mb-2">History Records</h3>
                    <ul class="space-y-3">
                        @forelse ($patient->medicalHistory as $record)
                            <li class="border border-gray-300 p-4 rounded-md">
                                <p><span class="font-semibold text-gray-600">Date:</span>
                                    {{ $record->created_at ?? 'NA' }}</p>
                                <p><span class="font-semibold text-gray-600">Diagnosis:</span>
                                    {{ $record->current_diagnosis ?? 'NA' }}</p>
                                <p><span class="font-semibold text-gray-600">Prescription:</span>
                                    {{ $record->prescription ?? 'NA' }}</p>
                            </li>
                        @empty
                            <p class="text-gray-600 mt-4">No medical history records available.</p>
                        @endforelse
                    </ul>
                @else
                    <livewire:backend.medical-record.medical-record :id="$patient->id" />
                @endif
            </div>
        </div>
    @endcan
</div>
