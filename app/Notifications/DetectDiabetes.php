<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientDiabetes;

class DetectDiabetes extends Notification
{
    use Queueable;
    private $patientDiabetes;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($patientDiabetes)
    {
        $this->patientDiabetes = $patientDiabetes;
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
            'id'=> $this->patientDiabetes->id,
            'title'=>'your diabetes detected with status '.$this->patientDiabetes->diabetes_status,
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
