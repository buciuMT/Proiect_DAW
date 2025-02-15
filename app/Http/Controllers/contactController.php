<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class contactController extends Controller
{
    //
    function view()
    {
        return view('contact');
    }
    function store(Request $req)
    {
        Mail::to(config('app.ADMIN_MAIL', env('ADMIN_MAIL', 'example@example.com')))->send(new TestEmail($req->message));
        return redirect()->route('index');
    }
}
