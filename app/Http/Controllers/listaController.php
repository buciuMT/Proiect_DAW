<?php

namespace App\Http\Controllers;

use App\Models\ListaCarteModel;
use App\Models\ListaModel;
use App\Models\model_carte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

function addToFavorites($userId, $isbn)
{
    // Find the user
    $user = User::findOrFail($userId);

    // Check if user has a favorite list, if not create it
    if (!$user->favorite) {
        $lista = ListaModel::forceCreate(['user' => $user->id]);
        $user->update(['favorite' => $lista->id]);
    } else {
        $lista = $user->favoriteList;
    }

    // Check if the item is already in the favorite list
    $exists = ListaCarteModel::where('model_carte', $isbn)->where('id_lista', $lista->id)
        ->exists();

    if (!$exists) {
        // Add the book to the list
        ListaCarteModel::forceCreate([
            'id_lista' => $lista->id,
            'model_carte' => $isbn
        ]);
    }


    return response()->json(['success' => 'Book added to favorite'], 200);
}

class listaController extends Controller
{

    public function store(Request $request)
    {
        //        $request->validate(['isbn' => 'exists|unique:model_carte']);
        return addToFavorites($request->user()->id, $request->isbn);
    }
    public function view()
    {
        return view('lista', ['user' => Auth::user(), 'books' => ListaModel::where('id', Auth::user()->favorite)->get()]);
    }
}
