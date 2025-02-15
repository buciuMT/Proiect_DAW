<?php

namespace App\Http\Controllers;

use App\Models\carte;
use App\Models\categorie;
use App\Models\categorie_model_carte;
use App\Models\model_carte;
use App\Models\recenzie;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function view(Request $request, string $isbn)
    {
        $model = model_carte::find($isbn);
        $recenzi = recenzie::where('isbn', $isbn)->get();
        $categorii = categorie_model_carte::where('isbn', $isbn)->get();
        return view('carte', ['model' => $model, 'recenzii' => $recenzi, 'categorii' => $categorii]);
    }

    /**
     * Display the specified resource.
     */
    public function show(carte $carte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(carte $carte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, carte $carte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(carte $carte)
    {
        //
    }
}
