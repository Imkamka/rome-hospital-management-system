<?php

namespace App\Livewire\Backend\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class AppointmentApproved extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Approved Appointment')]

    public $search = "";

    public function mount()
    {
        Gate::authorize('isDoctor', auth()->user());
    }

    public function render()
    {
        return view('livewire.backend.appointments.appointment-approved')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('status', 'Approved')
                    ->where('doctor_id', auth()->id())
                    ->paginate(10)
            ]);
    }
}
