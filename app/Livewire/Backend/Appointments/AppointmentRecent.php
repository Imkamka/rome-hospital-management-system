<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\Appointment;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class AppointmentRecent extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('New Appointment')]

    public $search = "";

    public function mount()
    {
        Gate::authorize('isDoctor', auth()->user());
    }

    public function render()
    {
        return view('livewire.backend.appointments.appointment-recent')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('appointment_number', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('status', 'Pending')
                    ->where('doctor_id', auth()->id())
                    ->paginate(10)
            ]);
    }
}
