<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $username;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username,$content)
    {
        $this->username=$username;
        $this->content=$content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.loginsuccess');
    }
}
