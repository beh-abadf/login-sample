<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $message_must_send;
    private $message_identity;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message_must_send, $message_identity)
    {
        $this->message_must_send = ['message_data' => $message_must_send];
        $this->message_identity = $message_identity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->message_identity== '1')
        {
            $message= $this->subject("Welcome")->view('welcome_email_message', $this->message_must_send);
        }
        else if($this-> message_identity == '2')
        {
            $message= $this->subject("Verification Code")->view('code_email_message', $this->message_must_send);
        }
        return $message;
    }
}
