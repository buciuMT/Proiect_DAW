<?php

namespace App\Http\Controllers;

use App\Models\model_carte;
use Illuminate\Http\Request;

class angajatdashController extends Controller
{
    function view($other = null)
    {
        if ($other)
            return view('employeedashboard', $other);
        return view('employeedashboard');
    }
    function update(Request $request)
    {
        if ($request->model_carte_adaug) {
            $request->validate([
                'url' => "required|url|max:255",
                'number' => 'required|integer|gte:0'
            ]);
            $isbn = model_carte::create_from_link($request->url);

            return route('angajatdash.view', ['carte_noua' => true]);
        }
        return 404;
    }
}
