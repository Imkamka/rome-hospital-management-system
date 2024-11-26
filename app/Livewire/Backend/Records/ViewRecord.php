<?php

namespace App\Livewire\Backend\Records;

use App\Models\MedicalRecord;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ViewRecord extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('View Record')]

    public $record;

    public function mount(int $id)
    {
        $this->record = MedicalRecord::with('medicalHistory')->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.backend.records.view-record');
    }
}
