<div>
    <form wire:submit.prevent="save">
        <div class="bg-gray-100 min-h-screen space-y-4">
            <!-- Patient Record -->
            <section>
                @include('livewire.backend.records.pa_record')
            </section>
            <!-- Medical History -->
            <section>
                @include('livewire.backend.records.med_hist')
            </section>
            <!-- General Section -->
            <section>
                @include('livewire.backend.records.general')
            </section>
            <!-- Physical Exam -->
            <section>
                @include('livewire.backend.records.phy_exam')
            </section>
            <!-- Skin Section -->
            <section>
                @include('livewire.backend.records.skin_exam')
            </section>
            {{-- Attachments  --}}
            <section>
                @include('livewire.backend.records.attachments')
            </section>
            <section>
                @include('livewire.backend.records.diagnoses')
            </section>

            <section class="flex justify-end mt-4">
                <button type="submit"
                    class="text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center transition-all duration-500 ease-in-out">Submit</button>
            </section>
        </div>
    </form>

</div>
