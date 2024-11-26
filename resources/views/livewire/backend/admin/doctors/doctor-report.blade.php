<div>
    <div class=" bg-gray-100 ">
        <div class="bg-white p-6 shadow rounded-md">
            <h2 class="text-2xl text-gray-600 font-semibold mb-4">{{ __('Appointment Records') }}</h2>
            <div class="mb-4 space-y-2">
                <label for="search" class="block text-sm font-semibold text-gray-500">{{ __('From date') }}</label>
                <div class="flex ">
                    <input type="date" placeholder="{{ __('Ingrese el nombre completo del paciente') }}"
                        class="w-full border border-gray-300 p-2 rounded-md"
                        wire:model.live.debounce.500ms="from_date" />
                </div>
                <label for="search" class="block text-sm font-semibold text-gray-500">{{ __('To date') }}</label>
                <div class="flex ">
                    <input type="date" placeholder="{{ __('Ingrese el nombre completo del paciente') }}"
                        class="w-full border border-gray-300 p-2 rounded-md" wire:model.live.debounce.500ms="to_date" />
                </div>
            </div>
            @if ($from_date && $to_date)
                <h3 class="text-sm font-semibold mt-8 mb-8 text-center text-gray-600">Doctor Report Between
                    "{{ $from_date }} to
                    {{ $to_date }}"</h3>
            @endif
            <div class="overflow-x-auto  sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 p-2">{{ __('#') }}</th>
                            <th>Doctor Name</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Registered Date</th>
                            <th class="border border-gray-300 p-2">{{ __('Acción') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($from_date && $to_date)
                            @forelse ($doctors as $doctor)
                                <tr wire:key="{{ $doctor->id }}"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="border border-gray-300 p-2 text-center">{{ $loop->iteration ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2">
                                        {{ $doctor->first_name . ' ' . $doctor->last_name ?? 'NA' }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $doctor->doctor->phone ?? 'NA' }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $doctor->email ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $doctor->created_at->format('d M, Y H:i') ?? 'NA' }}
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center text-blue-600 space-x-1">
                                        <div
                                            class="flex md:flex-row space-x-2 items-center justify-center flex-col space-y-2 md:space-y-0">
                                            <a wire:navigate href="{{ route('admin.doctors-detail', $doctor) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline transition">{{ __('Profile') }}</a>
                                            <a wire:navigate href="{{ route('admin.doctors-appointment', $doctor) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline transition">{{ __('Appointments') }}</a>
                                            <a wire:navigate href="{{ route('admin.doctors-patient', $doctor) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline transition">{{ __('Patients List') }}</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border border-gray-300 p-4 text-center text-gray-500">
                                        No Result Found
                                    </td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
                <div>{{ $doctors->links() }}</div>
            </div>
        </div>
    </div>
</div>
