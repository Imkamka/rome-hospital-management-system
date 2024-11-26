<?php

namespace App\Livewire\Backend\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Completed extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Completed Appointment')]

    public $search;

    public function render()
    {
        return view('livewire.backend.appointments.completed')
            ->with([
                'appointments' => Appointment::whereHas('patient', function ($query) {
                    $query->whereHas('patient', function ($q) {

                        $q->where('full_name', 'LIKE', '%' . $this->search . '%');
                    });
                })
                    ->where('status', 'Completed')
                    ->where('doctor_id', auth()->id())
                    ->paginate(10)
            ]);;
    }
}
