<div class="bg-white p-6 rounded-lg shadow-lg mx-auto">
    <h2 class="text-2xl font-bold mb-6">Medical History</h2>

    <h3 class="text-xl font-semibold mb-4">Pathological History</h3>
    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2">Pathologies</label>
        <div class="flex items-center space-x-4">
            <select wire:model="form.pathologies"
                class="p-2 border rounded-md @error('form.pathologies') border-red-500 @enderror">
                <option value="" selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <input type="text" wire:model="form.pathologies_comments" placeholder="Which ones?"
                class="border rounded-lg px-3 py-2 w-full">
        </div>
        @error('form.pathologies_comments')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2">Allergies</label>
        <div class="flex items-center space-x-4">
            <select wire:model="form.allergy"
                class="p-2 border rounded-md @error('form.allergy') border-red-500 @enderror">
                <option value="" selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <input type="text" wire:model="form.allergy_comments" placeholder="Which ones?"
                class="border rounded-lg px-3 py-2 w-full">
        </div>
        @error('form.allergy_comments')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2">Surgeries and Hospitalizations</label>
        <div class="flex items-center space-x-4">
            <select wire:model="form.surgeries_hospitalizations"
                class="p-2 border rounded-md @error('form.surgeries_hospitalizations') border-red-500 @enderror">
                <option value="" selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <input type="text" wire:model="form.surgeries_hospitalizations_comments" placeholder="Which ones?"
                class="border rounded-lg px-3 py-2 w-full">
        </div>
        @error('form.surgeries_hospitalizations_comments')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2">Previous plastic surgeries</label>
        <div class="flex items-center space-x-4">

            <select wire:model="form.pre_plastic_surgeries"
                class="p-2 border rounded-md @error('form.pre_plastic_surgeries') border-red-500 @enderror">
                <option value="" selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <input type="text" wire:model="form.pre_plastic_surgeries_comments" placeholder="Which ones?"
                class="border rounded-lg px-3 py-2 w-full">
        </div>
        @error('form.pre_plastic_surgeries_comments')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <h3 class="text-xl font-semibold mt-8 mb-4">Non-Pathological History</h3>

    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2">Smoking</label>
        <div class="flex items-center space-x-4">
            <select wire:model="form.smoking"
                class="p-2 border rounded-md @error('form.smoking') border-red-500 @enderror">
                <option value="" selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <input type="text" wire:model="form.smoking_comments" placeholder="Specify"
                class="border rounded-lg px-3 py-2 w-full">
        </div>
        @error('form.smoking_comments')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2">Alcohol</label>
        <div class="flex items-center space-x-4">
            <select wire:model="form.alcohol"
                class="p-2 border rounded-md @error('form.alcohol') border-red-500 @enderror">
                <option value="" selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <input type="text" wire:model="form.alcohol_comments" placeholder="Specify"
                class="border rounded-lg px-3 py-2 w-full">
        </div>
        @error('form.alcohol_comments')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2">Physical Activity</label>
        <div class="flex items-center space-x-4">
            <select wire:model="form.phy_activity"
                class="p-2 border rounded-md @error('form.phy_activity') border-red-500 @enderror">
                <option value="" selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <input type="text" wire:model="form.phy_activity_comments" placeholder="Specify"
                class="border rounded-lg px-3 py-2 w-full">
        </div>
        @error('form.phy_activity_comments')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
