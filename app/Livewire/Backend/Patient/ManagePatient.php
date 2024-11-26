<?php

namespace App\Livewire\Backend\Patient;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class ManagePatient extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Patient Management')]

    public $search = "";

    public function render()
    {
        return view('livewire.backend.patient.manage-patient')
            ->with([
                'users' => User::where('created_by', auth()->id())
                    ->whereHas('patient', function ($query) {
                        $query->where('full_name', 'LIKE', '%' . $this->search . '%');
                    })
                    ->latest()
                    ->paginate(10),
            ]);
    }
}
