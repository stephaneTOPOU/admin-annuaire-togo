<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\PopUp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pays;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popups = DB::table('categories')
            ->join('sous_categories', 'categories.id', '=', 'sous_categories.categorie_id')
            ->join('entreprises', 'sous_categories.id', '=', 'entreprises.souscategorie_id')
            ->join('pop_ups', 'entreprises.id', '=', 'pop_ups.entreprise_id')
            ->join('admins', 'admins.id', '=', 'pop_ups.admin_id')
            ->select('*', 'pop_ups.id as identifiant', 'admins.name as admin')            
            ->get();

        return view('popup.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        $entreprises = Entreprise::all();
        return view('popup.add', compact('pays', 'entreprises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = array();
        //dd($request->all());
        $data = $request->validate([
            'entreprise_id' => 'required|integer'
        ]);

        try {

            $data = new PopUp();
            $data->admin_id =  Auth::user()->id;

            // $data->pays_id = $request->pays_id;            
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $image = $request->file('image')->storeAs('Popup', $filename, 'public');
            //     $data->image = $image;
            // }

            if ($files = $request->file('image')) {
                foreach ($files as $fic) {
                    //get filename with extension
                    $filenamewithextension = $fic->getClientOriginalName();

                    //get filename without extension
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                    //get file extension
                    $extension = $fic->getClientOriginalExtension();

                    //filename to store
                    $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                    //Upload File to external server
                    Storage::disk('ftp')->put($filenametostore, fopen($fic, 'r+'));

                    //Upload name to database
                    $image[] = $filenametostore;
                }
            }

            $data->image = implode('|', $image);
            $data->entreprise_id = $request->entreprise_id;
            $data->save();
            return redirect()->route('popup.index')->with('success', 'Popup ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->route('popup.index')->with('success', $e->getMessage());
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
    public function edit($popup)
    {

        $popups = PopUp::find($popup);
        $pays = Pays::all();
        $entreprises = Entreprise::all();
        return view('popup.update', compact('popups', 'pays', 'entreprises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $popup)
    {
        $data = $request->validate([
            'entreprise_id' => 'required|integer'
        ]);

        try {
            $data = PopUp::find($popup);

            $data->admin_id =  Auth::user()->id;

            //$data->pays_id = $request->pays_id;
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $image = $request->file('image')->storeAs('Popup', $filename, 'public');
            //     $data->image = $image;
            // }

            if ($files = $request->file('image')) {
                foreach ($files as $fic) {
                    //get filename with extension
                    $filenamewithextension = $fic->getClientOriginalName();

                    //get filename without extension
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                    //get file extension
                    $extension = $fic->getClientOriginalExtension();

                    //filename to store
                    $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                    //Upload File to external server
                    Storage::disk('ftp')->put($filenametostore, fopen($fic, 'r+'));

                    //Upload name to database
                    $image[] = $filenametostore;
                }
            }

            $data->image = implode('|', $image);
            $data->entreprise_id = $request->entreprise_id;
            $data->update();
            return redirect()->route('popup.index')->with('success', 'Popup mis à jour avec succès');
        } catch (Exception $e) {
            return redirect()->route('popup.index')->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($popup)
    {
        try {
            $data = PopUp::find($popup);
            $data->delete();
            return redirect()->back()->with('success', 'Popup supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
