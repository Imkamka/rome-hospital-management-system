<div>
    <section class="bg-gray-100 py-16">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md ">
            <!-- Profile Header -->
            <div class="flex items-center space-x-6">
                <img src="{{ asset('storage/images/' . $doctor->image) }}"
                    alt="{{ $doctor->first_name . ' ' . $doctor->last_name }}"
                    class="w-32 h-32 rounded-full border-4 border-green-500">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">{{ $doctor->first_name . ' ' . $doctor->last_name }}
                    </h2>
                    <p class="text-xl text-gray-600">{{ $doctor->doctor->specialization }}</p>
                </div>
            </div>

            <!-- Bio Section -->
            <div class="mt-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">About</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ $doctor->doctor->about }}
                </p>
            </div>

            <!-- Contact Details -->
            <div class="mt-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Contact Information</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><strong>Email:</strong> {{ $doctor->email }}</li>
                    <li><strong>Phone:</strong> {{ $doctor->doctor->phone }}</li>
                    <li><strong>Location:</strong> ABC, ROMA</li>
                </ul>
            </div>

            <!-- Call to Action -->
            <div class="mt-8 flex justify-end">
                <a wire:navigate href="{{ route('patient.register') }}"
                    class="px-6 py-2 bg-gray-400 text-sm text-white font-semibold rounded-lg shadow hover:bg-gray-700 transition duration-200">
                    Book Appointment
                </a>
            </div>
        </div>
    </section>
</div>
