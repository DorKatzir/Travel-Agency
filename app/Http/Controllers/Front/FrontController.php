<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function home() {
        return view('front.home');
    }

    public function about() {
        return view('front.about');
    }

    public function registration() {
        return view('front.registration');
    }

    public function registration_submit(Request $request) {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);

        $token = hash('sha256',time());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = $token;
        $user->save();

        $verification_link = url('registration-verify-email/'.$token.'/'.$request->email);
        $subject = "Registration Verification";
        $message = "To complete registration, please click on the link below:<br>";
        $message .= "<a href='".$verification_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');
    }

    public function registration_verify_email($token, $email) {

        dd($email, $token);

    }

    public function login() {
        return view('front.login');
    }

    public function forget_password() {
        return view('front.forget-password');
    }
}
