<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgot()
    {
        return view('auth.pwreset');
    }


    public function password(Request $request)
    {

        // user nga email qe ka futur
        $user = User::whereEmail($request->email)->first();

        if ($user == null) {
            return redirect()->back()->with(['error' => 'Email does not exists']);
        }

        $user = Sentinel::findById($user->id);

        $reminder = Reminder::exists($user) ?: Reminder::create($user);

        if ($reminder == true) {
            $reminder_userid = Reminder::where('user_id', '=', $user->id)->first();
            $this->sendEmail($user, $reminder_userid->code);
        }
        return redirect()->back()->with(['success' => 'Reset code sent to your email']);
    }

    public function sendEmail($user, $code)
    {
        Mail::send(
            'email.forgot',
            ['user' => $user, 'code' => $code],
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject("$user->username reset your password");
                $message->from("laravelproject2@gmail.com");
            }
        );
    }


    public function resetlink(Request $request, $email, $code)
    {
        $user = User::whereEmail($email)->first();

        if ($user == null) {
            echo 'Email does not exists';
        }

        $user = Sentinel::findById($user->id);

        $reminder = Reminder::exists($user);

        if ($reminder) {
            if ($code == $request->code) {
                return view('auth.pwresetlink')->with(['user' => $user, 'code' => $code]);
            } else {
                return redirect('/');
            }
        } else {
            echo 'Time has expired';
        }
    }

    public function newPassword(Request $request, $email, $code)
    {

        $request->validate([
            'new_password' => [
                'required', 'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $user = User::whereEmail($email)->first();

        if ($user == null) {
            echo 'Email does not exists';
        }

        $user = Sentinel::findById($user->id);

        $reminder = Reminder::exists($user);

        if ($reminder) {
            if ($code == $request->code) {

                //Reminder::complete($user, $code, $request->new_password);
                $user->update(['password' => Hash::make($request->new_password)]);

                return view('auth.login')->with('succes', 'password reset. login with new password');
            } else {
                return redirect('/');
            }
        } else {
            echo 'Time has expired';
        }
    }
}
