<?php

namespace App\Livewire\Backend\Admin\Users;

use App\Models\MedicalRecord;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class UserMedicalRecords extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Patient Records')]

    public $search = '';
    public $userId;

    public function mount(int $id): void
    {

        $this->userId = $id;
    }

    public function render()
    {
        return view('livewire.backend.admin.users.user-medical-records')
            ->with([
                'records' => MedicalRecord::where('record_number', 'LIKE', '%' . $this->search . '%')
                    ->where('patient_id', $this->userId)
                    ->latest()
                    ->paginate(10)
            ]);;
    }
}
