<?php

namespace App\Livewire\Backend\Search;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class PatientSearch extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Patient Search')]

    public $search;

    public function render()
    {
        return view('livewire.backend.search.patient-search', [
            'patients' => User::latest()
                ->orWhere('full_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
                ->where('created_by', auth()->id())
                ->paginate(10)
        ]);
    }
}
