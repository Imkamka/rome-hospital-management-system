<?php

namespace App\Livewire\Backend\Reports;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class AppointmentReport extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Appointment Report')]

    public $from_date = '';
    public $to_date = '';

    public function render()
    {
        return view('livewire.backend.reports.appointment-report', [
            'appointments' => Appointment::whereBetween('appointment_date', [
                Carbon::parse($this->from_date)->startOfDay(),
                Carbon::parse($this->to_date)->endOfDay(),
            ])
                ->where('doctor_id', auth()->id())
                ->paginate(10)
        ]);
    }
}
