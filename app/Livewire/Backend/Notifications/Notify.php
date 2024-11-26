<?php

namespace App\Livewire\Backend\Notifications;

use App\Models\Appointment;
use Livewire\Component;

class Notify extends Component
{
    public $notifications;
    public $unread;
    // public $isShow = false;

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
        $this->unread = $this->notifications->whereNull("read_at")->count();
    }

    public function markAsReadAp($unread)
    {
        // dd($unread);
        $appointment = Appointment::findOrFail($unread["data"]["appointment_id"]);

        $notification = auth()->user()->notifications->find($unread["id"]);
        if ($notification) {
            $notification->markAsRead();
        }

        $this->notifications = auth()->user()->unreadNotifications; // Update notifications
        if (auth()->user()->role === "Doctor") {
            return $this->redirectRoute('appointment.detail', $appointment->id, navigate: true);
        }
        return $this->redirectRoute('appointment.history', navigate: true);
    }
    public function render()
    {
        return view('livewire.backend.notifications.notify');
    }
}
