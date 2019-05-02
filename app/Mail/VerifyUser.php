<?php

namespace Metrocinemas\Mail;

use Metrocinemas\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //trae todos los usuarios que no han confirmado su email
        $this->users = User::where('email_verified_at', null)
            ->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify-mail');
    }
}
