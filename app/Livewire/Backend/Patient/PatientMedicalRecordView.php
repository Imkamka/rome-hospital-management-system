<?php

namespace App\Livewire\Backend\Patient;

use App\Models\MedicalRecord;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class PatientMedicalRecordView extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Medical Record Detail')]
    public $record;

    public function mount(int $id)
    {
        $this->record = MedicalRecord::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.backend.patient.patient-medical-record-view');
    }
}
