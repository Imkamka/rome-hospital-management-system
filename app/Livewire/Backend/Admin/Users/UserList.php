<?php

namespace App\Livewire\Backend\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class UserList extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Register Users')]

    public $search = '';

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete($user->id);
        flash()->success("User successfully Deleted");
    }

    public function render()
    {
        return view('livewire.backend.admin.users.user-list')
            ->with([
                "users" => User::latest()
                    ->whereHas("patient", function ($query) {
                        $query->where("full_name", "LIKE", "%" . $this->search . "%");
                    })
                    ->where("role", "Patient")
                    ->paginate(10)
            ]);
    }
}
