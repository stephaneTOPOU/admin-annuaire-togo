<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categories;
use App\Models\SousCategories;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SousCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sousCategories = DB::table('categories')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->select('*', 'sous_categories.id as identifiant', 'categories.libelle as categorie')
            ->orderBy('sous_categories.id', 'desc')
            ->get();

        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('sub-categorie.index', compact('sousCategories', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('sub-categorie.add', compact('categories', 'fonctions'));
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
            'libelle' => 'required|string',
            'categorie_id' => 'required|integer',
        ]);

        try {
            $data = new SousCategories();
            $data->categorie_id = $request->categorie_id;
            $data->libelle = $request->libelle;
            $data->save();
            return redirect()->back()->with('success', 'Sous - catégorie Ajouté avec succès');
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
    public function edit($souscategorie)
    {
        $souscategories = SousCategories::find($souscategorie);
        $categories = Categories::all();
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('sub-categorie.update', compact('categories', 'souscategories', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $souscategorie)
    {

        $data = $request->validate([
            'libelle' => 'required|string',
            'categorie_id' => 'required|integer',
        ]);

        try {
            $data = SousCategories::find($souscategorie);
            $data->categorie_id = $request->categorie_id;
            $data->libelle = $request->libelle;
            $data->update();
            return redirect()->back()->with('success', 'Sous - catégorie mise à jour avec succès');
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
    public function destroy($souscategorie)
    {
        $souscategories = SousCategories::find($souscategorie);
        try {
            $souscategories->delete();
            return redirect()->back()->with('success', 'Sous - catégorie supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
