<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Annonce;
use App\Models\CategorieAnnonce;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonce::all();
        $fonctions = Auth::user();
        
        return view('annonce.index', compact('annonces', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategorieAnnonce::all();
        $fonctions = Auth::user();

        return view('annonce.add', compact('categories', 'fonctions'));
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
            'categorie_id' => 'required|integer',
            'titre' => 'required|string',
            'text1' => 'required|string'
        ]);

        try {
            $data = new Annonce();
            $data->categorie_id = $request->categorie_id;
            $data->titre = $request->titre;
            $data->descriptionCourte = $request->descriptionCourte;
            $data->text1 = $request->text1;
            $data->text2 = $request->text2;
            $data->text3 = $request->text3;

            if ($request->hasFile('image1')) {

                //get filename with extension
                $filenamewithextension = $request->file('image1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image1'), 'r+'));

                //Upload name to database
                $data->image1 = $filenametostore;
            }

            if ($request->hasFile('image2')) {

                //get filename with extension
                $filenamewithextension = $request->file('image2')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image2')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

            if ($request->hasFile('image3')) {

                //get filename with extension
                $filenamewithextension = $request->file('image3')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image3')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            if ($request->hasFile('image4')) {

                //get filename with extension
                $filenamewithextension = $request->file('image4')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image4')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image4'), 'r+'));

                //Upload name to database
                $data->image4 = $filenametostore;
            }

            if ($request->hasFile('image5')) {

                //get filename with extension
                $filenamewithextension = $request->file('image5')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image5')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image5'), 'r+'));

                //Upload name to database
                $data->image5 = $filenametostore;
            }

            if ($request->hasFile('image6')) {

                //get filename with extension
                $filenamewithextension = $request->file('image6')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image6')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image6'), 'r+'));

                //Upload name to database
                $data->image6 = $filenametostore;
            }

            if ($request->hasFile('video')) {

                //get filename with extension
                $filenamewithextension = $request->file('video')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('video')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('video'), 'r+'));

                //Upload name to database
                $data->video = $filenametostore;
            }

            $data->save();
            return redirect()->back()->with('success', 'Annonce Ajoutée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit($annonce)
    {
        $annonces = Annonce::find($annonce);

        $categories = CategorieAnnonce::all();

        $fonctions = Auth::user();

        return view('annonce.update', compact('annonces', 'categories', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $annonce)
    {
        $data = $request->validate([
            'categorie_id' => 'required|integer',
        ]);

        try {
            $data = Annonce::find($annonce);
            $data->categorie_id = $request->categorie_id;
            $data->titre = $request->titre;
            $data->descriptionCourte = $request->descriptionCourte;
            $data->text1 = $request->text1;
            $data->text2 = $request->text2;
            $data->text3 = $request->text3;

            if ($request->hasFile('image1')) {

                //get filename with extension
                $filenamewithextension = $request->file('image1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image1'), 'r+'));

                //Upload name to database
                $data->image1 = $filenametostore;
            }

            if ($request->hasFile('image2')) {

                //get filename with extension
                $filenamewithextension = $request->file('image2')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image2')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

            if ($request->hasFile('image3')) {

                //get filename with extension
                $filenamewithextension = $request->file('image3')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image3')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            if ($request->hasFile('image4')) {

                //get filename with extension
                $filenamewithextension = $request->file('image4')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image4')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image4'), 'r+'));

                //Upload name to database
                $data->image4 = $filenametostore;
            }

            if ($request->hasFile('image5')) {

                //get filename with extension
                $filenamewithextension = $request->file('image5')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image5')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image5'), 'r+'));

                //Upload name to database
                $data->image5 = $filenametostore;
            }

            if ($request->hasFile('image6')) {

                //get filename with extension
                $filenamewithextension = $request->file('image6')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image6')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('image6'), 'r+'));

                //Upload name to database
                $data->image6 = $filenametostore;
            }

            if ($request->hasFile('video')) {

                //get filename with extension
                $filenamewithextension = $request->file('video')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('video')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp9')->put($filenametostore, fopen($request->file('video'), 'r+'));

                //Upload name to database
                $data->video = $filenametostore;
            }

            $data->update();
            return redirect()->back()->with('success', 'Annonce mise à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        //$annonces = Annonce::find($annonce);
        try {
            $annonce->delete();
            return redirect()->back()->with('success', 'Annonce supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
