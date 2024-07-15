<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientData;

class AddPatientData extends Notification
{
    use Queueable;
    private $patientData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    
    public function __construct($patientData)
    {
        $this->patientData = $patientData;
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
            'id'=> $this->patientData->id,
            'title'=>'there added for new data',
            'user'=> auth('web')->user()->name,

        ];
        // {"id":1,"title":"there added for new data","user":"sayed ahmed zare"};
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

}

