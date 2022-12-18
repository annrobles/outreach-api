<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;

class VerifyEmailController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        $user = User::find($id);
        abort_if(!$user, 403);
        abort_if(!hash_equals($hash, sha1($user->getEmailForVerification())), 403);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }

        //generate random password
        $random_password = uniqid();
        $user->update(['password' => Hash::make($random_password)]);

        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'password' => $random_password
            ];

        Mail::to($user->email)->send(new WelcomeMail($data));

        return ['message'=> 'Email has been verified',];
    }

    public function resendNotification(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return ['message'=> 'OK.'];
    }
}
