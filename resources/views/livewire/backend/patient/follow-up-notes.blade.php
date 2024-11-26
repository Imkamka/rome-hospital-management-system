<div>
    @if (session('success'))
        @include('includes._message')
    @endif
    <div x-data="{ follow: false, selectedID: null }" class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Follow-Up Appointments</h2>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @if ($appointments->isNotEmpty())
                @foreach ($appointments as $appointment)
                    <div wire:key="{{ $appointment->id }}"
                        class="bg-white border border-gray-200 rounded-lg shadow-lg p-5">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">
                                {{ $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name }}</h3>
                            <span class="text-sm font-medium text-green-600">Follow-Up - {{ $appointment->id }}</span>
                        </div>

                        <div class="text-gray-600 mb-4 space-y-4">
                            <p class="text-sm">
                                <strong>Follow-Up Date:</strong> <span
                                    class="text-gray-800">{{ $appointment->follow_up_date ?? 'NA' }}</span>
                            </p>
                            <p class="text-sm">
                                <strong>Notes:</strong> <span
                                    class="text-gray-800">{{ $appointment->follow_up_notes ?? 'NA' }}</span>
                            </p>
                        </div>

                    </div>
                @endforeach
            @else
                <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-5">

                    <div class="text-gray-600 py-4 text-center">
                        <p class="text-sm">
                            <strong>No notes available:</strong> <span class="text-gray-800"></span>
                        </p>

                    </div>

                </div>
            @endif

        </div>
    </div>

</div>
