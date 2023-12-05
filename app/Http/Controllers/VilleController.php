<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Ville;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = DB::table('pays')
            ->join('villes', 'pays.id', '=', 'villes.pays_id')
            ->select('*', 'villes.id as identifiant', 'villes.libelle as ville')
            ->get();
        return view('ville.index', compact('villes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        return view('ville.add', compact('pays'));
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
            'pays_id'=>'required|integer',
            'libelle'=>'required|string',
        ]);

        try {
            $data = new Ville();

            $data->pays_id = $request->pays_id;
            $data->libelle = $request->libelle;
            $data->region = $request->region;
            
            $data->save();
            return redirect()->back()->with('success', 'Ville ajoutée avec succès');
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
    public function edit($ville)
    {
        $villes = Ville::find($ville);
        $pays = Pays::all();

        return view('ville.update', compact('pays', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ville)
    {
        $data = $request->validate([
            'pays_id'=>'required|integer',
            'libelle'=>'required|string',
        ]);

        try {
            $data = Ville::find($ville);

            $data->pays_id = $request->pays_id;
            $data->libelle = $request->libelle;
            $data->region = $request->region;
            
            $data->update();
            return redirect()->back()->with('success', 'Ville mise à jour avec succès');
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
    public function destroy($ville)
    {
        $villes = Ville::find($ville);
        try {
            $villes->delete();
            return redirect()->back()->with('success', 'Ville supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
