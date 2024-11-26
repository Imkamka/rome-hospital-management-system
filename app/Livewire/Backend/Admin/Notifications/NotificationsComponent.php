<?php

namespace App\Livewire\Backend\Admin\Notifications;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class NotificationsComponent extends Component
{
    #[Layout("components.layouts.admin")]
    #[Title("Updates")]

    public $notifications;
    // public $isShow = false;

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
    }

    public function markAsRead($unread)
    {
        // dd($unread);
        $user = User::findOrFail($unread["data"]["user_id"]);

        $notification = auth()->user()->notifications->find($unread["id"]);
        if ($notification) {
            $notification->markAsRead();
        }

        $this->notifications = auth()->user()->unreadNotifications; // Update notifications
        if ($user["role"] === "Patient") {
            return $this->redirectRoute('admin.users-list', navigate: true);
        } elseif ($user["role"] === "Doctor") {
            return $this->redirectRoute('admin.doctors-list', navigate: true);
        }
    }

    // public function show(int $id)
    // {
    //     dd($id);
    //     $this->isShow = !$this->isShow;
    // }

    public function render()
    {
        return view('livewire.backend.admin.notifications.notifications-component');
    }
}
