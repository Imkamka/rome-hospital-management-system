<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignmentStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $status;
    protected $patientName;
    protected $appointmentDate;
    /**
     * Create a new notification instance.
     */
    public function __construct($status, $patientName, $appointmentDate)
    {
        $this->status = $status;
        $this->patientName = $patientName;
        $this->appointmentDate = $appointmentDate;
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
        return (new MailMessage)
            ->greeting("Hello {$this->patientName},")
            ->line("Your appointment scheduled for **{$this->appointmentDate}** has been updated.")
            ->line("New status: **{$this->status}**.")
            ->action('View Appointment', route('appointment.history'))
            ->line('Thank you for trusting our services!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'status' => $this->status,
            'appointment_date' => $this->appointmentDate,
        ];
    }
}
