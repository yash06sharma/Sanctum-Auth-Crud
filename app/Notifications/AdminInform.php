<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminInform extends Notification
{
    use Queueable;
    protected $EmailData;

    /**
     * Create a new notification instance.
     */
    public function __construct($EmailData)
    {
        $this->EmailData = $EmailData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('User Status')
        ->from('tutuapp.center.dmn@gmail.com', 'Yash')
        ->greeting($this->EmailData['greeting'])
        ->line($this->EmailData['email'] . $this->EmailData['showText'])
        ->line('click the below link for approval!')
        ->action('Approve', url('api/useractivelink',$this->EmailData['id']))
        ->line('Best regards!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
