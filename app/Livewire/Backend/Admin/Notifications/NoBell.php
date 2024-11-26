<?php

namespace App\Livewire\Backend\Admin\Notifications;

use Livewire\Component;

class NoBell extends Component
{
    public $unread;
    public function mount()
    {
        $this->unread = auth()->user()->notifications->whereNull("read_at")->count();
    }
    public function render()
    {
        return view('livewire.backend.admin.notifications.no-bell');
    }
}
