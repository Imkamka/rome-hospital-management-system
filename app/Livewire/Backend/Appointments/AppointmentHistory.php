<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\Appointment;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class AppointmentHistory extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Appointment History')]

    public $search = '';

    public function cancel(Appointment $appointment)
    {
        $appointment->status = "Cancelled";
        $appointment->save();
        Session::flash('success', 'Appointment cancelled');
    }

    public function render()
    {
        return view('livewire.backend.appointments.appointment-history')
            ->with([
                'appointments' => Appointment::where('patient_id', auth()->id())
                    ->latest()
                    ->paginate(10)
            ]);
    }
}
