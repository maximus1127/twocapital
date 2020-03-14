<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email, $message, $permission)
    {
        $this->user = $user;
        $this->message = $message;
        $this->email = $email;
        $this->permission = $permission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.new-contact-form')->with(['user' => $this->user, 'content'=> $this->message, 'email' => $this->email, 'permission' => $this->permission]);
    }
}
