<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntrepriseNonvalideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = DB::table('categories')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'categories.libelle as categorie', 'entreprises.id as identifiant', 'entreprises.nom as ent', 'sous_categories.libelle as subcat')
            ->where('entreprises.valide', 0)
            ->get();

        $fonctions = Auth::user();

        return view('entreprise.index', compact('entreprises', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
