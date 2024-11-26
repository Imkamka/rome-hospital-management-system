<?php

namespace App\Livewire\Backend\Admin\Specialization;

use App\Models\Specialization;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class SpecManage extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Manage Specialization')]

    public $search = '';

    public $specialization;
    public $selectedID;

    public function isUpdate($selectedID = null)
    {
        $spec = Specialization::findOrFail($selectedID);
        $spec->name = $this->specialization;
    }
    // Method to update specialization
    public function update($selectedID)
    {
        // Find the specialization record by ID
        $spec = Specialization::find($selectedID);
        dd($spec);
        // If the specialization exists, update the name
        if ($spec) {
            $spec->name = $this->specialization;
            $spec->save();
        }
    }


    public function delete(Specialization $spec)
    {
        $spec->delete($spec->id);
        flash()->success('Specialization successfully deleted');
    }

    public function render()
    {
        return view('livewire.backend.admin.specialization.spec-manage')
            ->with([
                'specializations' => Specialization::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orderBy('name', 'asc')
                    ->paginate(10)
            ]);
    }
}
