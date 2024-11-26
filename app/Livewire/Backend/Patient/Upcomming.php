<?php

namespace App\Livewire\Backend\Patient;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Upcomming extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Upcomming Appointments')]

    public $search;

    public function render()
    {
        return view('livewire.backend.patient.upcomming')
            ->with([
                'appointments' => Appointment::where('patient_id', auth()->id())
                    ->whereHas('doctor', function ($query) {
                        $query->where('username', 'LIKE', '%' . $this->search . '%');
                    })
                    ->where('status', 'Approved')
                    ->latest()
                    ->paginate(10)
            ]);
    }
}
