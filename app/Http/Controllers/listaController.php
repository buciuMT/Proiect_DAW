<?php

namespace App\Http\Controllers;

use App\Models\ListaModel;
use App\Models\model_carte;
use App\Models\User;
use Illuminate\Http\Request;

class listaController extends Controller
{
    public function store(Request $request)
    {
        dump($request);
    }
    public function addFavoriteByIsbn($user, $isbn)
    {
        $book = model_carte::where('isbn', $isbn)->first();

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $lista = ListaModel::create([
            'user' => $user->id,  // assuming you want to assign this list to the user
            'aprobat' => null,  // Assuming you can set aprobat to null or use any value
            'aprobat_de' => null,  // Same for aprobat_de
            'return' => null  // Assuming you want to leave this as null for now
        ]);

        $lista->listaCarte()->create([
            'model_carte' => $book->isbn,
            'carte' => null,
        ]);

        // Step 4: Assign the 'lista' to the user's 'favorite' field
        $user->favorite = $lista->id;
        $user->save();

        return response()->json(['success' => 'Book added to favorite'], 200);
    }
}
