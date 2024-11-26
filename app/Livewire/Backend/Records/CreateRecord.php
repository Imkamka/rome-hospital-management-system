<?php

namespace App\Livewire\Backend\Records;

use App\Livewire\Forms\RecordForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class CreateRecord extends Component
{
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    #[Title('New Record')]

    public RecordForm $form;
    public $patient_id;

    public function mount(int $id)
    {
        $patient = User::findOrFail($id);
        $this->patient_id = $patient->id;
    }
    public function save()
    {
        $this->validate();
        $this->form->storeRecord($this->patient_id);
        $this->form->storeMedicalHistory();

        $this->form->storeGeneral();
        $this->form->storePhyExam();
        $this->form->storeSkinExam();
        $this->form->storeAttachments();
        $this->form->storeDiagnostics();

        flash()->success("Saved success.");
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.backend.records.create-record');
    }
}
