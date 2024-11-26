<?php

namespace App\Livewire\Backend\Reports;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class PatientReport extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Patient Report')]

    public $from_date = "";
    public $to_date = '';

    public function render()
    {
        return view('livewire.backend.reports.patient-report', [
            'patients' => User::latest()
                ->whereBetween('created_at', [
                    Carbon::parse($this->from_date)->startOfDay(),
                    Carbon::parse($this->to_date)->endOfDay()
                ])
                ->where('created_by', auth()->id())
                ->paginate(10)

        ]);
    }
}
