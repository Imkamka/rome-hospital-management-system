<?php

namespace App\Livewire\Backend\Admin\Doctors;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class DoctorReport extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Doctors Report')]
    public $from_date;
    public $to_date;

    public function render()
    {
        return view('livewire.backend.admin.doctors.doctor-report')
            ->with([
                'doctors' => User::whereBetween('created_at', [
                    Carbon::parse($this->from_date)->startOfDay(),
                    Carbon::parse($this->to_date)->endOfDay(),
                ])
                    ->where('role', "Doctor")
                    ->paginate(10)
            ]);
    }
}
