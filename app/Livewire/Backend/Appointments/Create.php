<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\User;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\Specialization;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Notifications\AppointmentBooked;

class Create extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Book Appointment')]

    public $doctor_id = null;
    public $appointment_date;
    public $appointment_time;
    public $message;

    protected $rules = [
        'doctor_id' => 'required',
        'appointment_date' => 'required|date|after_or_equal:today',
        'appointment_time' => 'required',
        'message' => 'nullable|min:4'
    ];


    public function create()
    {
        $validatedData = $this->validate();
        $validatedData['patient_id'] = auth()->id();

        $appointment = Appointment::create($validatedData);
        // Get the doctor

        // $doctor = $appointment->doctor_id;
        $doctor = User::findOrFail($appointment->doctor_id);
        // Send notification to the doctor
        $roleIsDoctor = $doctor->where('role', 'Doctor')->first();
        if ($roleIsDoctor) {
            $roleIsDoctor->notify(new AppointmentBooked($appointment));
        }
        // $doctor->notify(new AppointmentBooked($appointment));
        $this->reset();
        flash()->success('Appointment request successfully sent');
    }

    public function render()
    {

        return view('livewire.backend.appointments.create')->with([
            'doctors' => User::where('role', 'doctor')->get(),
            'specs' => Specialization::orderBy('name', 'asc')
                ->get()
        ]);
    }
}
