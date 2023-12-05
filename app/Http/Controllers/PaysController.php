<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use Exception;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Pays::all();
        return view('pays.index', compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pays.add');
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
            'iso'=>'required|string',
            'libelle'=>'required|string'
        ]);

        try {
            $data = new Pays();

            $data->iso = $request->iso;
            $data->libelle = $request->libelle;
            
            $data->save();
            return redirect()->back()->with('success', 'Pays ajouté avec succès');
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
    public function edit($pay)
    {
        $pays = Pays::find($pay);
        return view('pays.update', compact('pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pay)
    {
        $data = $request->validate([
            'iso'=>'required|string',
            'libelle'=>'required|string'
        ]);

        try {
            $data = Pays::find($pay);

            $data->iso = $request->iso;
            $data->libelle = $request->libelle;
            
            $data->update();
            return redirect()->back()->with('success', 'Pays ajouté avec succès');
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
    public function destroy($pay)
    {
        $pays = Pays::find($pay);
        try {
            $pays->delete();
            return redirect()->back()->with('success', 'Pays supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
