<?php

namespace App\Livewire\Backend\Patient;

use App\Models\MedicalRecord;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class PatientMedicalRecords extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('All Medical Records')]

    public $search = "";

    public function render()
    {
        return view('livewire.backend.patient.patient-medical-records')
            ->with([
                'records' => MedicalRecord::where('record_number', 'LIKE', '%' . $this->search . '%')
                    ->where('patient_id', auth()->id())
                    ->latest()
                    ->paginate(10)
            ]);
    }
}
