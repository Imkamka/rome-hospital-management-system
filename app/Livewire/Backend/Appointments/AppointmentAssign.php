<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\User;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AppointmentAssign extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Assign Appointment')]

    public $search = "";
    public $patient_id, $appointment_date, $appointment_time, $remark;

    public function mount()
    {
        Gate::authorize('isDoctor', auth()->user());
    }

    protected $rules = [
        'patient_id' => 'required|exists:users,id',
        'appointment_date' => 'required|date|after_or_equal:today',
        'appointment_time' => 'required|date_format:H:i',
        'remark' => 'required|string|max:255',
    ];
    protected $messages = [
        'patient_id.required' => 'Please select the patient'
    ];

    public function assign()
    {

        $this->validate();

        Appointment::updateOrCreate([
            'patient_id' => $this->patient_id,
            'doctor_id' => auth()->id(),
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'remark' => $this->remark
        ]);

        $this->reset();
        flash()->success('Appointment assign successfully sent');
    }

    public function render()
    {
        return view('livewire.backend.appointments.appointment-assign')
            ->with([
                'patients' => User::where('created_by', auth()->id())
                    ->latest()
                    ->get()
            ]);
    }
}
