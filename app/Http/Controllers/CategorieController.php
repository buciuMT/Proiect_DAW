<?php

namespace App\Http\Controllers;

use App\Models\categorie;
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
