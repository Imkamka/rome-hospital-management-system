<?php

namespace App\Livewire\Backend\Patient;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class FollowUpNotes extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Follow-up Notes')]

    public $search;

    public function render()
    {
        return view('livewire.backend.patient.follow-up-notes')
            ->with([
                'appointments' => Appointment::where('patient_id', auth()->id())
                    ->where('status', 'Follow-Up')
                    ->latest()
                    ->paginate(10)
            ]);
    }
}
