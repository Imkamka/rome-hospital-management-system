<?php

namespace App\Livewire\Backend\Admin\Users;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class UsersAppointment extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Patient Appointments')]

    public $search = '';
    public $userId;

    public function mount(int $id): void
    {

        $this->userId = $id;
    }

    public function render()
    {
        return view('livewire.backend.admin.users.users-appointment')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('patient_id', $this->userId)
                    ->latest()
                    ->paginate(10)
            ]);
    }
}
