<?php

namespace App\Livewire\Backend\Patient;

use App\Models\MedicalHistory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class RecordDetails extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Record Details')]

    public $search;
    public $record;

    public function mount(int $id)
    {
        $this->record = MedicalHistory::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.backend.patient.record-details');
    }
}
