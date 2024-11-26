<div>

    <div class="container mx-auto  bg-white shadow-md rounded-md p-8">
        <!-- Page Title -->
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-semibold mb-4">{{ 'Record' . ' #' . $record->record_number }}</h2>
            <a wire:navigate href="{{ route('patient.medical-record') }}"
                class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded transition hover:bg-blue-600">{{ __('Back') }}</a>

        </div>
        <hr class="py-4">
        <!-- General Information Section -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Record Information</h2>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Consultation Type</label>
                    <p>{{ $record->consultation_type ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Referred by</label>
                    <p>{{ $record->referred_by ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Date of Consultation</label>
                    <p>{{ $record->record_date ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Habits</label>
                    <p>{{ $record->habits ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Clinic</label>
                    <p>{{ $record->clinic ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <p>{{ $record->email ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                    <p>{{ $record->Gender ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Place of Residence</label>
                    <p>{{ $record->place_of_residence ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Socioeconomic Status</label>
                    <p>{{ $record->socio_economic_status ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Education</label>
                    <p>{{ $record->education_level ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <p>{{ $record->phone ?? 'N/A' }}</p>
                </div>
            </div>
        </section>

        <hr class="py-4">
        <!-- General Information Section -->
        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-4">General Information</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Consultation For</label>
                    <p>{{ $record->general->consultation_for ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Current Illness</label>
                    <p>{{ $record->general->current_illness ?? 'N/A' }}</p>
                </div>


                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">System Review</label>
                    <p>{{ $record->general->system_review ?? 'N/A' }}</p>
                </div>
            </div>
        </section>
        <hr class="py-4">
        <!-- Vital Signs Section -->
        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Vital Signs</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Date of Consultation</label>
                    <p>{{ $record->general->date ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Time of Consultation</label>
                    <p>{{ $record->general->time ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Heart Rate (BPM)</label>
                    <p>{{ $record->general->heart_rate ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Respiratory Rate</label>
                    <p>{{ $record->general->respiratory_rate ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">BP</label>
                    <p>{{ $record->general->bp ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Temperature (°C)</label>
                    <p>{{ $record->general->temperature ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">SPO2 Saturation (%)</label>
                    <p>{{ $record->general->spo2_saturation ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Capillary Glucose</label>
                    <p>{{ $record->general->capillary_glucose ?? 'N/A' }}</p>
                </div>
            </div>
        </section>
        <hr class="py-4">

        <!-- Medical History Section -->
        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Medical History</h2>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-6">

                <!-- Pathologies -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Pathologies</label>
                    <p>{{ $record->medicalHistory->pathologies ?? 'N/A' }}</p>
                </div>

                <!-- Pathologies Comments -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Pathologies Comments</label>
                    <p>{{ $record->medicalHistory->pathologies_comments ?? 'N/A' }}</p>
                </div>

                <!-- Allergies -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Allergies</label>
                    <p>{{ $record->medicalHistory->allergies ?? 'N/A' }}</p>
                </div>

                <!-- Allergy Comments -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Allergy Comments</label>
                    <p>{{ $record->medicalHistory->allergy_comments ?? 'N/A' }}</p>
                </div>

                <!-- Smoking -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Smoking</label>
                    <p>{{ $record->medicalHistory->smoking ?? 'N/A' }}</p>
                </div>

                <!-- Smoking Comments -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Smoking Comments</label>
                    <p>{{ $record->medicalHistory->smoking_comments ?? 'N/A' }}</p>
                </div>

                <!-- Alcohol -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Alcohol</label>
                    <p>{{ $record->medicalHistory->alcohol ?? 'N/A' }}</p>
                </div>

                <!-- Alcohol Comments -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Alcohol Comments</label>
                    <p>{{ $record->medicalHistory->alcohol_comments ?? 'N/A' }}</p>
                </div>

                <!-- Physical Activity -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Physical Activity</label>
                    <p>{{ $record->medicalHistory->phy_activity ?? 'N/A' }}</p>
                </div>

                <!-- Physical Activity Comments -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Physical Activity Comments</label>
                    <p>{{ $record->medicalHistory->phy_activity_comments ?? 'N/A' }}</p>
                </div>
            </div>
        </section>
        <hr class="py-4">

        <!-- Physical Exam Section -->
        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Physical Exam</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Head - Front</label>
                    <p>{{ $record->physicalExam->head_front_comment ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Head - Side</label>
                    <p>{{ $record->physicalExam->head_side_comment ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Head - Back</label>
                    <p>{{ $record->physicalExam->head_back_comment ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Upper Limbs</label>
                    <p>{{ $record->physicalExam->upper_limbs ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Torso and Abdomen</label>
                    <p>{{ $record->physicalExam->torso_abdomen ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Lower Limbs</label>
                    <p>{{ $record->physicalExam->lower_limbs ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Back and Glutes</label>
                    <p>{{ $record->physicalExam->back_glutes ?? 'N/A' }}</p>
                </div>
            </div>
        </section>
        <hr class="py-4">
        <!-- Skin Exam Section -->
        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Skin Exam</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Wrinkle Analysis</label>
                    <p>{{ $record->skinExam->wrinkle_comment ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Fitzpatrick Scale</label>
                    <p>{{ $record->skinExam->fitz_comment ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Sun Exposure Time</label>
                    <p>{{ $record->skinExam->sun_exposure ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Dermatological Lesion and
                        Type</label>
                    <p>{{ $record->skinExam->dermatological_lesion_type ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Sunscreen Use</label>
                    <p>{{ $record->skinExam->sun_screen ?? 'N/A' }}</p>
                </div>
            </div>
        </section>

        <hr class="py-4">

        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Diagnostics</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Wrinkle Analysis</label>
                    <p>{{ $record->diagnoses->general ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Fitzpatrick Scale</label>
                    <p>{{ $record->diagnoses->facial ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Sun Exposure Time</label>
                    <p>{{ $record->diagnoses->dermatological_facial ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Dermatological Lesion and
                        Type</label>
                    <p>{{ $record->diagnoses->physiotherapy ?? 'N/A' }}</p>
                </div>

            </div>
        </section>

        <hr class="py-4">
        <!-- Attachments Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Attachments</h2>
            @if ($record->attachments)
                <div class="grid md:grid-cols-3 gap-6 grid-cols-1">
                    @foreach ($record->attachments as $attachment)
                        <div class="form-group border hover:border-yellow-500 transition rounded p-4 cursor-pointer">
                            <label class="block text-sm font-medium text-gray-700">Attachment</label>
                            <img src="{{ asset('storage/uploads/images/' . $attachment->image) }}"
                                class="w-full h-96" />
                        </div>
                    @endforeach
                </div>
            @else
                <p class="p-4 border border-blue-400 border-1">No attachments available.</p>
            @endif
        </section>
    </div>

</div>
