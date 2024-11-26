        <section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
                <h2 class="text-lg font-semibold text-gray-700"> Scheduled Appointments</h2>
                <p class="text-2xl font-bold text-yellow-600">{{ $approved->count() }}</p>
            </div>
            <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
                <h2 class="text-lg font-semibold text-gray-700">Completed Appointments</h2>
                <p class="text-2xl font-bold text-yellow-600">{{ $completed ?? 'NA' }}</p>
            </div>
            <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
                <h2 class="text-lg font-semibold text-gray-700">Follow Up Appointments</h2>
                <p class="text-2xl font-bold text-yellow-600">{{ $followupCount }}</p>
            </div>
            <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
                <h2 class="text-lg font-semibold text-gray-700">Pending Appointment</h2>
                <p class="text-2xl font-bold text-yellow-600">{{ $pendingCount ?? 'NA' }}</p>
            </div>

            <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
                <h2 class="text-lg font-semibold text-gray-700"> Cancelled Appointments</h2>
                <p class="text-2xl font-bold text-yellow-600">{{ $cancelled }}</p>
            </div>
            <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
                <h2 class="text-lg font-semibold text-gray-700">Total Appointments </h2>
                <p class="text-2xl font-bold text-yellow-600">{{ $appointments->count() }}</p>
            </div>
        </section>

        <section class="rounded-lg  pt-4">
            <div class="flex flex-col lg:flex-row gap-4 ">
                @foreach ($upnext as $next)
                    <div
                        class="bg-green-100 p-6 rounded-lg shadow-md w-full border hover:border-blue-600 transition cursor-pointer lg:w-1/4">
                        <h2 class="text-xl font-bold mb-4">Next Appointment</h2>
                        <p class="text-gray-600 font-medium">
                            {{ $next->patient->first_name . ' ' . $next->patient->last_name }}</p>
                        <p class="text-gray-500">
                            @php
                                $appointmentDate = \Carbon\Carbon::parse($next->appointment_date);
                            @endphp

                            @if ($appointmentDate->isToday())
                                <span>Today</span>
                            @elseif ($appointmentDate->isTomorrow())
                                <span>Tomorrow</span>
                            @else
                                <span>{{ $appointmentDate->format('M d, Y') }}</span>
                            @endif
                        </p>
                        <p class="text-gray-500 mb-4">
                            {{ \Carbon\Carbon::parse($next->appointment_time)->format('h:i A') }}</p>
                        <div class="flex justify-end">
                            <a wire:navigate href="{{ route('appointment.scheduled') }}"
                                class="px-3 py-1 bg-red-200 hover:text-gray-600 hover:bg-red-300 transition text-red-600 rounded-full text-sm">View
                                All</a>
                        </div>
                    </div>
                @endforeach
                @foreach ($pending as $list)
                    <div
                        class="bg-white p-6 rounded-lg shadow-md w-full border hover:border-blue-600 transition cursor-pointer lg:w-1/4 ">
                        <h2 class="text-xl font-bold mb-4">Pending</h2>
                        <p class="text-gray-600 font-medium">
                            {{ $list->patient->first_name . ' ' . $list->patient->last_name }}</p>
                        <p class="text-gray-500">
                            @php
                                $appointmentDate = \Carbon\Carbon::parse($list->appointment_date);
                            @endphp

                            @if ($appointmentDate->isToday())
                                <span>Today</span>
                            @elseif ($appointmentDate->isTomorrow())
                                <span>Tomorrow</span>
                            @else
                                <span>{{ $appointmentDate->format('M d, Y') }}</span>
                            @endif
                        </p>
                        <p class="text-gray-500 mb-4">
                            {{ \Carbon\Carbon::parse($list->appointment_time)->format('h:i A') }}</p>
                        <div class="flex justify-end">
                            <a wire:navigate href="{{ route('appointment.recent') }}"
                                class="px-3 py-1 bg-red-200 hover:text-gray-600 hover:bg-red-300 transition text-red-600 rounded-full text-sm">View
                                All</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
