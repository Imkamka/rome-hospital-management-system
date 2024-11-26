<?php

namespace App\Livewire\Backend\Patient;


use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ViewPatient extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Patient Details')]

    public $patient;
    public $isEditing = false;

    public function mount(int $id): void
    {
        $this->patient = User::findOrFail($id);
    }

    public function isCancel(): void
    {
        $this->isEditing = false;
    }

    public function isEdit()
    {
        $this->isEditing = true;
    }

    public function render()
    {
        return view('livewire.backend.patient.view-patient');
    }
}
