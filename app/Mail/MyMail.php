<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $subject;
    public $email;
    public $messageContent; // Rename $message to avoid conflicts with Illuminate\Mail\Message

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $subject, $email)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->email = $email;
        // $this->messageContent = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('emails.custom')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                // 'message' => $this->messageContent,
            ]);
    }
}
