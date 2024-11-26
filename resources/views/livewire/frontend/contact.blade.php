<div>
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <section class="bg-gray-100 py-16">
                <div class="container mx-auto px-6 text-center">
                    <h2 class="text-3xl font-bold mb-8">Contact Us</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Email Info -->
                        <div class="p-6 border bg-red-400 text-white rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-2">Email Info</h3>
                            <p><strong>Email:</strong> <a href="mailto:{{ $about_us->email }}"
                                    class="text-white underline">
                                    {{ $about_us->email }}</a></p>
                        </div>

                        <!-- Phone Info -->
                        <div class="p-6 border bg-blue-500 text-white rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-2">Phone Info</h3>
                            <p><strong>Phone:</strong> <a href="tel:{{ $about_us->mobile_number }}"
                                    class="text-white underline">
                                    {{ $about_us->mobile_number }}</a></p>
                        </div>

                        <!-- Address Info -->
                        <div class="p-6 border bg-green-500 text-white rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-2">Address Info</h3>
                            <p><strong>Address:</strong> {{ $about_us->address }}</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>


</div>
