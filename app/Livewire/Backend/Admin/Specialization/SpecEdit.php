<?php

namespace App\Livewire\Backend\Admin\Specialization;

use Livewire\Component;
use App\Models\Specialization;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class SpecEdit extends Component
{

    #[Layout('components.layouts.admin')]
    #[Title('Update Specialization')]

    #[Validate('required|string|max:255|unique:specializations,name')]
    public $name;

    public $specId = null;

    public function mount(int $id)
    {
        $specialization = Specialization::findOrFail($id);
        $this->name = $specialization->name;
        $this->specId = $specialization->id;
    }

    public function update()
    {
        $this->validate();
        $spec = Specialization::findOrFail($this->specId);
        $spec->update([
            "name" => $this->name
        ]);

        flash()->success("Specialization updated successfully");
    }
    public function render()
    {
        return view('livewire.backend.admin.specialization.spec-edit');
    }
}
