<?php

namespace App\Livewire\Backend\MedicalRecord;

use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MedicalRecord extends Component
{


    public $prescription_date, $reason_for_visit, $current_diagnosis, $prescription, $treatment_plans, $status, $patient_id;

    protected $rules = [
        'prescription_date' => 'required|date',
        'reason_for_visit' => 'required|max:255',
        'current_diagnosis' => 'required|max:5000',
        'status' => 'required|in:Active,Ongoing,Resolved',
        'prescription' => 'required|string|max:5000',
        'treatment_plans' => 'nullable|string|max:5000',
    ];

    public function mount(int $id)
    {
        $this->patient_id = $id;
    }


    public function updateRecord(User $patient)
    {

        $validatedData = $this->validate();

        $validatedData['patient_id'] = $this->patient_id;

        MedicalHistory::create($validatedData);

        // Display a success toast with no title
        flash()->success('Operation completed successfully.');
        return $this->redirect('/patient/details/' . $patient->id, navigate: true);
        $this->reset();
    }


    public function render()
    {
        return view('livewire.backend.medical-record.medical-record');
    }
}
