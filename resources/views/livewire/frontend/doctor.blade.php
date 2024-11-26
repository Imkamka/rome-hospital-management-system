<div>
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-8">Meet Our Doctors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($doctors as $list)
                    <div
                        class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg border hover:border-yellow-600 transition-colors cursor-pointer">
                        <img src="{{ asset('storage/images/' . $list->image) }}" alt="Doctor 1"
                            class="w-24 h-24 mx-auto rounded-full mb-4">
                        <h3 class="text-xl font-bold mb-2">{{ $list->first_name . ' ' . $list->last_name }}</h3>
                        <p class="text-gray-600 mb-4">Cardiologist</p>
                        <a wire:navigate href="{{ route('doctor.view', $list->id) }}"
                            class="text-red-700 font-semibold hover:text-gray-700 hover:bg-gray-300 px-2 py-1 text-sm bg-gray-200 rounded-2xl">View
                            Profile</a>
                    </div>
                @empty
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg">
                        <img src="doctor2.jpg" alt="Doctor 2" class="w-24 h-24 mx-auto rounded-full mb-4">
                        <h3 class="text-xl font-bold mb-2">Dr. John Smith</h3>
                        <p class="text-gray-600 mb-4">Neurologist</p>
                        <a href="#" class="text-green-600 font-semibold hover:underline">View Profile</a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg">
                        <img src="doctor3.jpg" alt="Doctor 3" class="w-24 h-24 mx-auto rounded-full mb-4">
                        <h3 class="text-xl font-bold mb-2">Dr. Sarah Lee</h3>
                        <p class="text-gray-600 mb-4">Dermatologist</p>
                        <a href="#" class="text-green-600 font-semibold  hover:underline">View
                            Profile</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
