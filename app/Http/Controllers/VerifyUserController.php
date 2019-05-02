<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\User;
use Metrocinemas\Mail\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerifyUserController extends Controller
{
    /**
     * Show a list of users with links to send emails.
     *
     * @return type
     */
     public function usersList()
     {
         $users = User::where('email_verified_at', null)
            ->get();
        
         return view('emails.users-list', compact('users'));
     }

    /**
     * Send the email to the user.
     *
     * @param User $user
     * @return type
     */
     public function sendMail(User $user)
     {
        Mail::to($user->email)->send(new VerifyUser($user->id));
        return redirect()->back()
            ->with([
            'notification' => 'Email enviado con exito',
            'alert-class' => 'alert-success'
        ]);
     }
}
