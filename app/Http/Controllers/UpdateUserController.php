<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\User;
use Metrocinemas\Mail\UserAdmin;
use Metrocinemas\Mail\UserEmp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UpdateUserController extends Controller
{
    /**
     * Show a list of users with links to send emails.
     *
     * @return type
     */
     public function usersList()
     {
         $employees = User::employee()
            ->paginate(10);

        $admins = User::administrator()
            ->paginate(10);
        
         return view('emails.users-list', compact('employees', 'admins'));
     }

     /**
     * Send the email to the user.
     *
     * @param User $user
     * @return type
     */
     public function makeAdmin(User $user)
     {
        $user->role = 'admin';
        $user->update();

        Mail::to($user->email)->send(new UserAdmin($user->id));
        return redirect()->back()
        ->with([
            'notification' => 'Email enviado con exito',
            'alert-class' => 'alert-success'
        ]);
     }

     /**
     * Send the email to the user.
     *
     * @param User $user
     * @return type
     */
     public function makeEmp(User $user)
     {
        $user->role = 'emp';
        $user->update();

        Mail::to($user->email)->send(new UserEmp($user->id));
        return redirect()->back()
            ->with([
                'notification' => 'Email enviado con exito',
                'alert-class' => 'alert-success'
            ]);
     }
}
