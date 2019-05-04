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

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        //trae el usuario a traves de su ID
        $this->user = User::where('id', $userId)
            ->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify-mail')
            ->with([
                'email_token' => $this->user->remember_token
        ]);
    }
}
