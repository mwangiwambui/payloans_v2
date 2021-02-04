<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanGuarantorNotication extends Notification
{
    use Queueable;
    private $loanguarantor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($loanguarantor)
    {
        $this->loanguarantor = $loanguarantor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->name($this->loanguarantor['name'])
                    ->line($this->loanguarantor['body'])
                    ->action($this->loanguarantor['text'], $this->loanguarantor['url'])
                    ->line($this->loanguarantor['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'guarantee_id' => $this->billData['guarantee_id']
        ];
    }
}
