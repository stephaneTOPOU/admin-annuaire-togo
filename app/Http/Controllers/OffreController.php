<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Exception;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::all();
        return view('offre.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('offre.add');
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
            'categorie' => 'required|string',
            'entreprise' => 'required|string',
            'titre' => 'required|string',
            'description' => 'required|string'
        ]);

        try {
            $data = new Offre();
            $data->categorie = $request->categorie;
            $data->entreprise = $request->entreprise;
            $data->titre = $request->titre;
            $data->description_courte = $request->description_courte;
            $data->description = $request->description;
            $data->mission = $request->mission;
            $data->profil = $request->profil;
            $data->dossier = $request->dossier;
            $data->lien = $request->lien;
            $data->site = $request->site;
            $data->lieu = $request->lieu;
            $data->facebook = $request->facebook;
            $data->twitter = $request->twitter;
            $data->linkedin = $request->linkedin;
            $data->date_lim = $request->date_lim;
            if ($request->valide) {
                $data->valide = $request->valide;
            } else {
                $data->valide = 0;
            }
            $data->save();
            return redirect()->back()->with('success', 'Offre Ajoutée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit($offre)
    {
        $offres = Offre::find($offre);
        return view('offre.update', compact('offres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $offre)
    {
        $data = $request->validate([
            'categorie' => 'required|string',
            'entreprise' => 'required|string',
            'titre' => 'required|string',
            'description' => 'required|string'
        ]);

        try {
            $data = Offre::find($offre);
            $data->categorie = $request->categorie;
            $data->entreprise = $request->entreprise;
            $data->titre = $request->titre;
            $data->description_courte = $request->description_courte;
            $data->description = $request->description;
            $data->mission = $request->mission;
            $data->profil = $request->profil;
            $data->dossier = $request->dossier;
            $data->lien = $request->lien;
            $data->site = $request->site;
            $data->lieu = $request->lieu;
            $data->facebook = $request->facebook;
            $data->twitter = $request->twitter;
            $data->linkedin = $request->linkedin;
            $data->date_lim = $request->date_lim;
            if ($request->valide) {
                $data->valide = $request->valide;
            } else {
                $data->valide = 0;
            }
            $data->update();
            return redirect()->back()->with('success', 'Offre mise à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        try {
            $offre->delete();
            return redirect()->back()->with('success','Offre supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
