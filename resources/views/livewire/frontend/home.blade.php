<div>
    <section class="bg-gray-100 text-gray-800">
        <div class="container mx-auto flex flex-col items-center text-center py-20 px-6">
            <h1 class="text-4xl font-bold mb-4">Welcome to Our Hospital Management System</h1>
            <p class="text-lg text-gray-600 mb-6">
                We provide seamless management solutions for hospitals, doctors, and patients.
            </p>
            <a wire:navigate href="{{ route('doctor.page') }}"
                class="bg-gray-400 text-white py-2 px-6 text-sm transition-colors rounded-md hover:bg-gray-700">
                View Doctors
            </a>
        </div>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 py-12 px-6">
            <div class="p-6 border bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-bold mb-2">For Doctors</h2>
                <p class="text-gray-600 mb-4">Efficient appointment scheduling and patient management.</p>
                <a wire:navigate href="{{ route('doctor.register') }}"
                    class="text-green-600 font-semibold hover:underline">Learn More</a>
            </div>
            <div class="p-6 border bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-bold mb-2">For Patients</h2>
                <p class="text-gray-600 mb-4">Book appointments, access health records, and more.</p>
                <a wire:navigate href="{{ route('patient.register') }}"
                    class="text-green-600 font-semibold hover:underline">Learn More</a>
            </div>
        </div>
    </section>
</div>
