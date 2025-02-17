<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Optuser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class otpcontroller extends Controller
{
    function view()
    {
        return view('otp_email');
    }
    function login(Request $request)
    {
        //if (Optuser::where('email', $request->email)->exists()) {
        $tuser = User::where('email', $request->email)->get()->first();
        if (!$tuser) {
            return 'fail';
        }
        $password = Str::random(60);
        Mail::to($request->email)->send(new TestEmail($password));
        $tuser->forceFill([
            'password' => Hash::make($password),
            'remember_token' => Str::random(60),
        ])->save();
        return view('otp_password', [
            'email' => $request->email
        ]);
    }
}
