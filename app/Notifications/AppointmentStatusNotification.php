<?php

namespace App\Notifications;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $appointment;
    protected $patient;

    /**
     * Create a new notification instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->patient = User::findOrFail($appointment->patient_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', "database"];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mailMessage = (new MailMessage)
            ->greeting("Hello {$this->patient->patient->full_name},")
            ->line("Your appointment scheduled for **{$this->appointment->appointment_date}** has been updated.")
            ->line("New status: **{$this->appointment->status}**.");

        if ($this->appointment->status) {
            $mailMessage->line("Remark: {$this->appointment->remark}");
        }

        $mailMessage->line('Thank you for trusting our services!');
        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'appointment_id' => $this->appointment->id,
            "remark" => $this->appointment->remark,
            'status' => $this->appointment->status,
        ];
    }
}
