<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\model_carte;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\ViewServiceProvider;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categorie_index', ['categorie' => DB::table('categorie')->get()]);
    }
    public function view($request)
    {
        $modelCarti = DB::table('model_carte')
            ->join('categorie_model_carte', 'model_carte.isbn', '=', 'categorie_model_carte.isbn')
            ->join('categorie', 'categorie_model_carte.nume_categorie', '=', 'categorie.nume_categorie')
            ->where('categorie.nume_categorie', $request)
            ->select('model_carte.*')
            ->get();
        return view('index', ['carti' => json_decode(json_encode($modelCarti->unwrap($modelCarti)), true)]);
    }
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
        $valideated = $request->validate([
            "nume_categorie" => "unique:categorie|required|max:255",
            'descriere' => 'max:255',
        ]);
        $request->user()->categorie()->create($valideated);
        return redirect(route('categorie.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $categorie)
    {
        return view("categorie.show", $categorie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $categorie)
    {
        //
    }
}
