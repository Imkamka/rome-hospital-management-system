<?php

namespace App\Livewire\Backend\Admin\Specialization;

use App\Models\Specialization;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class SpecCreate extends Component
{

    #[Layout('components.layouts.admin')]
    #[Title('Add New Specialization')]

    #[Validate('required|string|max:255|unique:specializations,name')]
    public $name;

    public function create()
    {
        $this->validate();
        Specialization::create([
            'name' => $this->name
        ]);
        flash()->success('Specialization Added Successfully');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.admin.specialization.spec-create');
    }
}
