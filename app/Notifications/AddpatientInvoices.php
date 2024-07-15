<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Invoices;
class AddpatientInvoices extends Notification
{
    use Queueable;
    private $patientInvoices;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($patientInvoices)
    {
        $this->patientInvoices = $patientInvoices;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable){
        return[

            //'data' => $this->details['body']
            'id'=> $this->patientInvoices->id,
            'title'=>'there added for new Invoices',
            'user'=> auth('employee')->user()->name,

        ];
        // {"id":1,"title":"there added for new data","user":"sayed ahmed zare"};
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
