<?php

namespace App\Livewire\Backend\Admin\Doctors;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class DoctorAppointments extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Doctors Appointment List')]

    public $search = '';
    public $doctorId;

    public function mount(int $id)
    {
        $this->doctorId = $id;
    }

    public function render()
    {
        return view('livewire.backend.admin.doctors.doctor-appointments')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('doctor_id', $this->doctorId)
                    ->latest()
                    ->paginate(10)
            ]);
    }
}
