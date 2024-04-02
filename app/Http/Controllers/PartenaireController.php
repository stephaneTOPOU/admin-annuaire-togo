<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Entreprise;
use App\Models\Partenaire;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires = DB::table('categories')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->join('partenaires', 'entreprises.id', '=', 'partenaires.entreprise_id')
            ->select('*', 'entreprises.nom as entreprise', 'partenaires.id as identifiant')
            ->get();

        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('partenaire.index', compact('partenaires', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entreprises = DB::table('categories')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'entreprises.nom as entreprise')
            ->get();

        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('partenaire.add', compact('entreprises', 'fonctions'));
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
            'image' => 'required|file'
        ]);

        try {
            $data = new Partenaire();
            $data->entreprise_id = $request->entreprise_id;
            
            if ($request->hasFile('image') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp8')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->save();
            return redirect()->back()->with('success', 'Partenaire Ajoutée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit($partenaire)
    {
        $entreprises = DB::table('categories')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'entreprises.nom as entreprise')
            ->get();

        $partenaires = Partenaire::find($partenaire);

        $fonctions = Admin::where('fonction', 'admin')->get();
        
        return view('partenaire.update', compact('entreprises','partenaires', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $partenaire)
    {
        $data = $request->validate([
            'entreprise_id' => 'required|integer'
        ]);

        try {
            $data = Partenaire::find($partenaire);
            $data->entreprise_id = $request->entreprise_id;
            
            if ($request->hasFile('image') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp8')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->update();
            return redirect()->back()->with('success', 'Partenaire mise à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($partenaire)
    {
        $partenaires = Partenaire::find($partenaire);
        try {
            $partenaires->delete();
            return redirect()->back()->with('success', 'Partenaire supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
