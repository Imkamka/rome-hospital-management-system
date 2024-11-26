<?php

namespace App\Livewire\Backend\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class FollowUp extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Follow-up Appointment')]

    public $search = '';

    #[Validate('required|date|after_or_equal:today')]
    public $follow_up_date;
    #[Validate('nullable|string|min:5|max:150')]
    public $follow_up_notes;



    public function followUp(Appointment $appointment)
    {
        $this->validate();
        $appointment->follow_up_date = $this->follow_up_date;
        $appointment->follow_up_notes = $this->follow_up_notes;
        $appointment->save();
        flash()->success('Saved...');
        return $this->redirect('/appointment/follow-up', navigate: true);
    }

    public function isCompleted(Appointment $appointment)
    {
        $appointment->status = "Completed";
        $appointment->save();
        $this->reset();
        Session::flash('success', 'Appointment Marked as Completed');
    }

    public function render()
    {
        return view('livewire.backend.appointments.follow-up')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('appointment_number', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('status', 'Follow-Up')
                    ->where('doctor_id', auth()->id())
                    ->paginate(15)
            ]);
    }
}
