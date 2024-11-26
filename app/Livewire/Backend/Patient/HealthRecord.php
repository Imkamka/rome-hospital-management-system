<?php

namespace App\Livewire\Backend\Patient;

use App\Models\MedicalHistory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class HealthRecord extends Component
{

    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Health Records')]

    public $search;

    public function render()
    {
        return view('livewire.backend.patient.health-record')
            ->with([
                'health_records' => MedicalHistory::where('patient_id', auth()->id())
                    ->where('current_diagnosis', 'LIKE', '%' . $this->search . '%')
                    ->latest()
                    ->paginate(10)
            ]);
    }
}
