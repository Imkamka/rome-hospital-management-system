<?php

namespace App\Livewire\Backend\Admin\Notifications;

use Livewire\Component;

class MarkAllAsRead extends Component
{
    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function render()
    {
        return view('livewire.backend.admin.notifications.mark-all-as-read');
    }
}
