<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Exception;
use Illuminate\Http\Request;
use App\Models\Pays;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametres = DB::table('pays')
        ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
        ->select('*', 'parametres.id as identifiant')
        ->get();
        return view('parametre.index', compact('parametres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        $parametres = Parametre::all();
        return view('parametre.add', compact('pays', 'parametres'));
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
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = new Parametre();

            
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->geolocalisation = $request->geolocalisation;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->lienface = $request->lienface;
            $data->lientwitter = $request->lientwitter;
            $data->lieninsta = $request->lieninsta;
            $data->lienyoutube = $request->lienyoutube;
            $data->pays_id = $request->pays_id;
            
            if ($request->logo_header) {
                $filename = time() . rand(1, 50) . '.' . $request->logo_header->extension();
                $logo_header = $request->file('logo_header')->storeAs('MiniSpot', $filename, 'public');
                $data->logo_header = $logo_header;
            }

            if ($request->logo_footer) {
                $filename2 = time() . rand(1, 50) . '.' . $request->logo_footer->extension();
                $logo_footer = $request->file('logo_footer')->storeAs('MiniSpot', $filename2, 'public');
                $data->logo_footer = $logo_footer;
            }

            $data->save();
            return redirect()->back()->with('success', 'Paramètre a été ajouté avec succès');
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
    public function edit($parametre)
    {
        $parametres = Parametre::find($parametre);
        $pays = Pays::all();
        return view('parametre.update',compact('parametres', 'pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $parametre)
    {
        $data = $request->validate([
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = Parametre::find($parametre);

            
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->geolocalisation = $request->geolocalisation;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->lienface = $request->lienface;
            $data->lientwitter = $request->lientwitter;
            $data->lieninsta = $request->lieninsta;
            $data->lienyoutube = $request->lienyoutube;
            $data->pays_id = $request->pays_id;
            
            if ($request->logo_header) {
                $filename = time() . rand(1, 50) . '.' . $request->logo_header->extension();
                $logo_header = $request->file('logo_header')->storeAs('MiniSpot', $filename, 'public');
                $data->logo_header = $logo_header;
            }

            if ($request->logo_footer) {
                $filename2 = time() . rand(1, 50) . '.' . $request->logo_footer->extension();
                $logo_footer = $request->file('logo_footer')->storeAs('MiniSpot', $filename2, 'public');
                $data->logo_footer = $logo_footer;
            }

            $data->update();
            return redirect()->back()->with('success', 'Paramètre mis à jour avec succès');
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
    public function destroy($id)
    {
        //
    }
}
