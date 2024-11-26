<?php

namespace App\Livewire\Backend\Appointments;

use App\Models\User;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;
use App\Notifications\AppointmentStatusNotification;

class AppointmentDetail extends Component
{
    public $remark = '';
    public $status = '';
    public $isEditing = false;
    public $doctorPatient = '';

    public Appointment $appointment;

    public function mount(Appointment $appointment, string $id)
    {
        Gate::authorize('view', $appointment);

        $this->appointment = Appointment::findOrFail($id);
    }

    public function isCancel(): void
    {
        $this->isEditing = false;
    }

    public function isUpdate(): void
    {
        $this->isEditing = true;
    }

    public function updateStatus(int $id)
    {
        $this->validate([
            'remark' => 'required',
            'status' => 'required'
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->remark = $this->remark;

        if ($this->status === 'Approved' || $this->status === "Follow-Up") {

            $patient = User::findOrFail($appointment->patient_id);
            $patient->created_by = auth()->id();
            $patient->save();

            Patient::firstOrCreate([
                'patient_id' => $patient->id
            ]);

            $patient->notify(
                new AppointmentStatusNotification($appointment)
            );
        }

        $appointment->status = $this->status;
        $appointment->save();
        $this->reset();
        flash()->success('Status has been updated!');
        return $this->redirect('/appointment/details/' . $id, navigate: true);
    }



    #[Layout('components.layouts.admin')]
    #[Title('Appointment Details')]
    public function render()
    {
        return view('livewire.backend.appointments.appointment-detail');
    }
}
