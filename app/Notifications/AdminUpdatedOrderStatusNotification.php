<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminUpdatedOrderStatusNotification extends Notification
{
    use Queueable;
    public $order;
    public $user;
    public $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($order, $user)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {

        switch ($this->order->status) {
            case 'in_progress':
                $this->message = 'Order assigned to a driver. He will contact you shortly.';
                break;
            case 'completed':
                $this->message = 'Thank you for riding with us! Please consider leaving a review.';
                break;
            case 'cancelled':
                $this->message = 'Unfortunately, the order was cancelled.';
                break;
            case 'failed':
                $this->message = 'We are sorry. The order failed due to some issues.';
                break;
            default:
                $this->message = 'Your order status was updated.';
        }

        return [
            'id' => $this->user->id,
            'message' => $this->message,
        ];
    }
}
