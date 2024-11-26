<?php

namespace App\Livewire\Backend\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class Scheduled extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Scheduled Appointment')]

    public $search = '';

    #[Validate('required')]
    public $appointment_time;
    #[Validate('required|date|after_or_equal:today')]
    public $appointment_date;
    #[Validate('required|string')]
    public $remark;


    public function reSchedule(Appointment $appointment)
    {
        $this->validate();
        $appointment->appointment_date = $this->appointment_date;
        $appointment->appointment_time = $this->appointment_time;
        $appointment->remark = $this->remark;
        $appointment->save();
        flash()->success('Saved...');
        return $this->redirect('/appointment/scheduled', navigate: true);
    }

    public function isCompleted(Appointment $appointment)
    {
        $appointment->status = "Completed";
        $appointment->save();
        flash()->success('Appointment Set to Completed');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.appointments.scheduled')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('appointment_number', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('status', 'Approved')
                    ->where('doctor_id', auth()->id())
                    ->orderBy('appointment_date', 'asc')
                    ->paginate(15)
            ]);
    }
}
