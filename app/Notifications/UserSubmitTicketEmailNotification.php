<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserSubmitTicketEmailNotification extends Notification
{
    use Queueable;
    public $user;
    public $ticket;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $ticket)
    {
        $this->user = $user;
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Support Ticket Has Been Answered')
            ->greeting('Hello ' . $this->user->name . ',')
            ->line('We have responded to your support ticket.')
            ->line('Reply:')
            ->line('"' . $this->ticket->reply . '"')
            ->action('View Your Ticket', url('submitTicket/myTickets')) // Change this to the actual ticket view URL
            ->line('Thank you for reaching out to us. We’re here to help anytime!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $this->user->id,
            'message' => 'Support replied to your ticket.',
        ];
    }
}
