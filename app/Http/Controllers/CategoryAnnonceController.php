<?php

namespace App\Http\Controllers;

use App\Models\CategorieAnnonce;
use Exception;
use Illuminate\Http\Request;

class CategoryAnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = CategorieAnnonce::all();

        return view('categorie-annonce.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie-annonce.add');
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
            'libelle'=>'required|string',
        ]);

        try {
            $data = new CategorieAnnonce();
            $data->libelle = $request->libelle;
            $data->save();
            return redirect()->back()->with('success','Catégorie Ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieAnnonce  $categorieAnnonce
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieAnnonce $categorieAnnonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieAnnonce  $categorieAnnonce
     * @return \Illuminate\Http\Response
     */
    public function edit($categorieAnnonce)
    {
        $categories = CategorieAnnonce::find($categorieAnnonce);

        return view('categorie-annonce.update', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieAnnonce  $categorieAnnonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categorieAnnonce)
    {
        $data = $request->validate([
            'libelle'=>'required|string',
        ]);

        try {
            $data = CategorieAnnonce::find($categorieAnnonce);
            $data->libelle = $request->libelle;
            $data->update();
            return redirect()->back()->with('success','Catégorie Ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieAnnonce  $categorieAnnonce
     * @return \Illuminate\Http\Response
     */
    public function destroy( $categorieAnnonce ) 
    {
        $categories = CategorieAnnonce::find($categorieAnnonce);
        try {
            $categories->delete();
            return redirect()->back()->with('success','Catégorie supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
