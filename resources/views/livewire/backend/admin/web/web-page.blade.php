<div>
    <div class="p-6 container mx-auto bg-white shadow-md rounded-md mb-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Update Website Details</h2>

        <!-- Form Start -->
        <form wire:submit.prevent="updateDetails" class="space-y-4">
            <!-- Page Title -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Page Title</label>
                <input type="text" wire:model="page_title" placeholder="Roma"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('page_title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Address</label>
                <input type="text" wire:model="address" placeholder="C-708, Noida Sector 37"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- About Us -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">About Us</label>
                <textarea rows="12" cols="3" wire:model="about_us"
                    placeholder="The Hospital Management System (HMS) is designed..."
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300 h-24 "></textarea>
                @error('about_us')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" wire:model="email" placeholder="info@gmail.com"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mobile Number -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Mobile Number</label>
                <input type="text" wire:model="mobile_number" placeholder="2147483647"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                @error('mobile_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
