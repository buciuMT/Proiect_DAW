<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_carte;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    function index(Request $req)
    {
        return view('index', ['carti' => model_carte::simplePaginate(20)]);
    }
}
