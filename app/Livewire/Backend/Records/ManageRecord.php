<?php

namespace App\Livewire\Backend\Records;

use App\Models\MedicalRecord;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class ManageRecord extends Component
{
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    #[Title('Manage Record')]
    public $search;

    public function render()
    {
        return view('livewire.backend.records.manage-record')
            ->with([
                'records' => MedicalRecord::latest()
                    ->where('record_number', 'LIKE', '%' . $this->search . '%')
                    ->where('doctor_id', auth()->id())
                    ->paginate(10)
            ]);
    }
}
