<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Horaire;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horaires = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->join('horaires', 'entreprises.id', '=', 'horaires.entreprise_id')
            ->select('*', 'entreprises.nom as entreprise', 'horaires.id as identifiant', 'pays.libelle as pays')
            ->get();
        return view('horaire.index', compact('horaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entreprises = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'entreprises.nom as entreprise', 'pays.libelle as pays')
            ->get();

        return view('horaire.add', compact('entreprises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'entreprise_id' => 'required|integer',
            'jour' => 'required|string',
            'h_ouverture' => 'required|string'
        ]);

        try {
            $data = new Horaire();
            $data->entreprise_id = $request->entreprise_id;
            $data->jour = $request->jour;
            $data->h_ouverture = $request->h_ouverture;
            
            $data->save();
            return redirect()->back()->with('success', 'Horaire Ajoutée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($horaire)
    {
        $entreprises = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'entreprises.nom as entreprise', 'pays.libelle as pays')
            ->get();

        $horaires = Horaire::find($horaire);

        return view('horaire.update', compact('horaires', 'entreprises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $horaire)
    {
        $data = $request->validate([
            'entreprise_id' => 'required|integer',
            'jour' => 'required|string',
            'h_ouverture' => 'required|string'
        ]);

        try {
            $data = Horaire::find($horaire);
            $data->entreprise_id = $request->entreprise_id;
            $data->jour = $request->jour;
            $data->h_ouverture = $request->h_ouverture;
            
            $data->update();
            return redirect()->back()->with('success', 'Horaire mis à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($horaire)
    {
        $horaires = Horaire::find($horaire);
        try {
            $horaires->delete();
            return redirect()->back()->with('success', 'Horaire supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
