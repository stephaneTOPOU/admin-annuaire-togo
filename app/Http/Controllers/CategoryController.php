<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Categories;
use App\Models\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->select('*', 'pays.libelle as pays', 'categories.libelle as categorie', 'categories.id as identifiant')
            ->get();
        return view('categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        return view('categorie.add', compact('pays'));
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
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = new Categories();
            $data->pays_id = $request->pays_id;
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
    public function edit($categorie)
    {
        $categories = Categories::find($categorie);
        $pays = Pays::all();
        return view('categorie.update', compact('categories', 'pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categorie)
    {
        
        $data = $request->validate([
            'libelle'=>'required|string',
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = Categories::find($categorie);
            $data->pays_id = $request->pays_id;
            $data->libelle = $request->libelle;
            $data->update();
            return redirect()->back()->with('success','Catégorie mise à jour avec succès');
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
    public function destroy($categorie)
    {
        $categories = Categories::find($categorie);
        try {
            $categories->delete();
            return redirect()->back()->with('success','Catégorie supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
