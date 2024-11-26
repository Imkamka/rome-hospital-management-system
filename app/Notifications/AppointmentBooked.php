<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentBooked extends Notification implements ShouldQueue
{
    use Queueable;
    private $appointment;
    /**
     * Create a new notification instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
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
            ->subject('New Appointment Booked: ' . $this->appointment->patient->username)
            ->greeting('Hello ' . $this->appointment->doctor->name . ',') // Custom greeting
            ->line('A new appointment has been booked by ' . $this->appointment->patient->username)
            ->line('Patient Details:')
            ->line('Name: ' . $this->appointment->patient->first_name . " " . $this->appointment->patient->last_name)
            ->line('Appointment Time: ' . $this->appointment->appointment_time->format('l, F j, Y \a\t g:i A')) // Formatting the appointment time
            ->action('View Appointment Details', url('/appointments/' . $this->appointment->id)) // Direct link to the appointment details
            ->line('Thank you for your dedication to our patients.'); // Closing line
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
            'patient_name' => $this->appointment->patient->first_name . " " . $this->appointment->patient->last_name,
            'appointment_time' => $this->appointment->appointment_time,
            'message' => 'A new appointment has been booked by ' . $this->appointment->patient_name,
        ];
    }
}
