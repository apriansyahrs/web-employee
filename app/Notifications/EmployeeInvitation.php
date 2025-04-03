<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\EmployeeInvitation as EmployeeInvitationModel;

class EmployeeInvitation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $invitation;

    public function __construct(EmployeeInvitationModel $invitation)
    {
        $this->invitation = $invitation;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $url = url('/register/employee/' . $this->invitation->token);
        
        return (new MailMessage)
            ->subject('Invitation to Join the Employee Portal')
            ->line('You have been invited to join the Employee Portal.')
            ->action('Register Now', $url)
            ->line('This invitation link will expire in 48 hours.')
            ->line('If you did not expect this invitation, no further action is required.');
    }
}
