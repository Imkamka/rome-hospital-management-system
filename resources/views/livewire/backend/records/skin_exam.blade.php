<div class="p-6 bg-white rounded-lg">
    <h1 class="text-3xl font-bold mb-4">Skin</h1>
    <div class="grid md:grid-cols-2 grid-col-1 gap-4">
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Wrinkle Analysis</h2>
            <div class="text-center mb-4">
                <img src="https://s3-alpha-sig.figma.com/img/8585/1538/9b040af110f9667287b8daee72034f38?Expires=1732492800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=cJch91HnsgQqHZICfThtKrUuLC1Romp9WX7GRf6fFmcEtIAA6wqY0MiXXoKhTQXXSBn5m5RL3eM1vE2PDJojsxS7ecshgCBu~MOMFxwN1TonVm~gKEkUX7qd6oxY07O0NgmMaLMYjsKc3F9sua84fY5A5hjgAoG6wGeqCE1dMyu~spr~kN5pi2FKStjbFeSDcSQWW44pHH6FQet7OlczDn8tfwBA-QXTOyNv48uJ9mo9qPHmKIHjNV1SW1L3hipnQSsTDIQOOPWGfZldEQBEXXfO-Cb45zGR8eQtTQTXeEwkIoxCEPDM9YmKQNuGuUzB7DSF7aFOQCL4WGBCjBylPA__"
                    alt="Combined Types Image" class="w-full rounded-md">
            </div>

            <div class="grid grid-cols-4 gap-2">
                <div class="text-center">
                    <p class="text-sm">Type 1</p>
                </div>
                <div class="text-center">
                    <p class="text-sm">Type 2</p>
                </div>
                <div class="text-center">
                    <p class="text-sm">Type 3</p>
                </div>
                <div class="text-center">
                    <p class="text-sm">Type 4</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                <div>
                    <label for="fitzpatrick_score" class="block text-sm font-medium text-gray-700">Score</label>
                    <input type="number" id="fitzpatrick_score"
                        class="mt-1 block py-3 px-4 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.score">
                    @error('form.score')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="wrinkle_comment" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea id="wrinkle_comment" rows="2"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="form.wrinkle_comment"></textarea>
                    @error('form.wrinkle_comment')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Fitzpatrick Scale</h2>
            <div class="text-center mb-4">
                <img src="{{ asset('images/skin.png') }}" alt="Combined Types Image" class="w-full rounded-md h-36">
            </div>
            <div class="grid grid-cols-4 gap-2">
                <div class="text-center">
                    <p class="text-sm">Type 1</p>
                </div>
                <div class="text-center">
                    <p class="text-sm">Type 2</p>
                </div>
                <div class="text-center">
                    <p class="text-sm">Type 3</p>
                </div>
                <div class="text-center">
                    <p class="text-sm">Type 4</p>
                </div>
            </div>

            <div class="mt-8">
                <label for="fitz_comment" class="block text-sm font-medium text-gray-700">Comment</label>
                <textarea id="fitz_comment" rows="2"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    wire:model="form.fitz_comment"></textarea>
                @error('form.fitz_comment')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <hr class="my-6">
    <div class="grid md:grid-cols-3 grid-cols-1 gap-4">
        <div>
            <label for="sun_exposure" class="block text-sm font-medium text-gray-700">Sun Exposure Time</label>
            <textarea id="sun_exposure" rows="2"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:model="form.sun_exposure"></textarea>
            @error('form.sun_exposure')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="dermatological_lesion" class="block text-sm font-medium text-gray-700">Dermatological Lesion and
                Type</label>
            <textarea id="dermatological_lesion" rows="2"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:model="form.dermatological_lesion_type"></textarea>
            @error('form.dermatological_lesion_type')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="sunscreen_use" class="block text-sm font-medium text-gray-700">Sunscreen</label>
            <textarea id="sunscreen_use" rows="2"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:model="form.sun_screen"></textarea>
            @error('form.sun_screen')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
