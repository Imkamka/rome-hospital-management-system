<?php

namespace App\Livewire\Backend\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class AppointmentCancelled extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Cancelled Appointment')]

    public $search = "";

    public function mount()
    {
        Gate::authorize('isDoctor', auth()->user());
    }

    public function render()
    {
        return view('livewire.backend.appointments.appointment-cancelled')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('appointment_number', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('status', 'Cancelled')
                    ->where('doctor_id', auth()->id())
                    ->paginate(10)
            ]);;
    }
}
