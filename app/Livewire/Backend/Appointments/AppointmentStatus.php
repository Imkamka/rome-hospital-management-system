<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentStatus extends Component
{

    public $appointment;

    public function mount($appointment)
    {
        $this->appointment = $appointment;
    }

    public function setStatus(Appointment $app)
    {
        dd($app);
    }

    public function render()
    {
        return view('livewire.backend.appointments.appointment-status')
            ->with(['appointment' => $this->appointment]);
    }
}
