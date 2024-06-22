<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreatedUser extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Bienvenido/a a Primax';
    public $name;
    public $document_number;
    public $random_password;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$document_number,$random_password, $url)
    {
        $this->name = $name;
        $this->document_number = $document_number;
        $this->random_password = $random_password;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.created_user');
    }
}
