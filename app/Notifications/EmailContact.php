<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailContact extends Notification
{
    use Queueable;
    private $date_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($date_id)
    {
        $this->date_id = $date_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toMail($notifiable)
    {
        // $url = 'http://127.0.0.1:8000/patientdiabetesreport'.$this->date_id;
        $url = 'http://127.0.0.1:8000/patientdiabetesreport';
        return (new MailMessage)
            ->greeting('Hello!')
            ->subject('add new Data')
            ->line('you add new Data Of Diabetes')
            ->action('Display Data',$url)
            ->line('Thank you for using our Salamtuk app !');
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
            //
        ];
    }
}
