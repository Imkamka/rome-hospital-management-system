<div class="bg-white p-6 shadow rounded-md mb-6">
    <h2 class="text-2xl font-semibold mb-4">Record #000001</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Medical Record Number -->
        <div class="w-full flex flex-col">
            <input wire:model="form.record_number" type="text" placeholder="Medical Record Number"
                class="p-2 border rounded-md @error('form.record_number') border-red-500 @enderror">
            @error('form.record_number')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <select wire:model="form.consultation_type"
                class="p-2 border rounded-md @error('form.consultation_type') border-red-500 @enderror">
                <option value="" disabled selected>Consultation Type</option>
                <option value="Initial Consultation">Initial Consultation</option>
                <option value="Follow-Up Consultation">Follow-Up Consultation</option>
                <option value="Emergency Consultation">Emergency Consultation</option>
                <option value="Teleconsultation">Teleconsultation</option>
                <option value="Routine Check-Up">Routine Check-Up</option>
                <option value="Specialist Consultation">Specialist Consultation</option>
                <option value="Pre-Operative Consultation">Pre-Operative Consultation</option>
                <option value="Post-Operative Consultation">Post-Operative Consultation</option>
                <option value="Psychiatric Consultation">Psychiatric Consultation</option>
                <option value="Nutritional Consultation">Nutritional Consultation</option>
                <option value="Rehabilitation Consultation">Rehabilitation Consultation</option>
                <option value="Diagnostic Consultation">Diagnostic Consultation</option>
                <option value="Pediatric Consultation">Pediatric Consultation</option>
                <option value="Gynecological Consultation">Gynecological Consultation</option>
                <option value="Dermatological Consultation">Dermatological Consultation</option>
            </select>
            @error('form.consultation_type')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <input wire:model="form.referred_by" type="text" placeholder="Referred by"
                class="p-2 border rounded-md @error('form.referred_by') border-red-500 @enderror">
            @error('form.referred_by')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">

            <!-- Record Date -->
            <input wire:model="form.record_date" type="date" placeholder="Record Date"
                class="p-2 border rounded-md @error('form.record_date') border-red-500 @enderror">
            @error('form.record_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Clinic -->
        <div class="flex flex-col">

            <input wire:model="form.clinic" type="text" placeholder="Clinic"
                class="p-2 border rounded-md @error('form.clinic') border-red-500 @enderror">
            @error('form.clinic')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">

            <!-- Habits (Tobacco) -->
            <input wire:model="form.habits" type="text" placeholder="Habits (Tobacco)"
                class="p-2 border rounded-md @error('form.habits') border-red-500 @enderror">
            @error('form.habits')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">

            <!-- Email Address -->
            <input wire:model="form.email" type="email" placeholder="Email Address"
                class="p-2 border rounded-md @error('form.email') border-red-500 @enderror">
            @error('form.email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <!-- Gender -->
            <select wire:model="form.gender"
                class="p-2 border rounded-md @error('form.gender') border-red-500 @enderror">
                <option value="" selected>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('form.gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <!-- Place of Residence -->
            <input wire:model="form.place_of_residence" type="text" placeholder="Place of Residence"
                class="p-2 border rounded-md @error('form.place_of_residence') border-red-500 @enderror">
            @error('form.place_of_residence')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Socioeconomic Status -->
        <div class="flex flex-col">
            <input wire:model="form.socio_economic_status" type="text" placeholder="Socioeconomic Status"
                class="p-2 border rounded-md @error('form.socio_economic_status') border-red-500 @enderror">
            @error('form.socio_economic_status')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Education Level -->
        <div class="flex flex-col">
            <select wire:model="form.education_level"
                class="p-2 border rounded-md @error('form.education_level') border-red-500 @enderror">
                <option value="" disabled selected>Education Level</option>
                <option value="High School">High School</option>
                <option value="Undergraduate">Undergraduate</option>
                <option value="Graduate">Graduate</option>
                <option value="Post-Graduate">Post-Graduate</option>
            </select>
            @error('form.education_level')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <!-- Phone Number -->
            <input wire:model="form.phone" type="number" placeholder="Phone Number"
                class="p-2 border rounded-md @error('form.phone') border-red-500 @enderror">
            @error('form.phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

    </div>
</div>
