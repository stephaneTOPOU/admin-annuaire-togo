<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Temoignage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Temoignage::all();
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('testimony.index', compact('testimonies', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('testimony.add', compact('fonctions'));
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
            'nom' => 'required|string',
            'image' => 'required|file',
            'note' => 'required|integer',
            'message' => 'required|string',
        ]);
        //dd($data);
        try {
            $data = new Temoignage();
            $data->nom = $request->nom;

            if ($request->hasFile('image')) {

                //get filename with extension
                $filenamewithextension = $request->file('image')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp13')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->note = $request->note;
            $data->message = $request->message;

            $data->save();
            return redirect()->back()->with('success', 'Témoignage Ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show(Temoignage $temoignage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function edit($temoignage)
    {
        $testimonies = Temoignage::find($temoignage);
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('testimony.update', compact('testimonies', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $temoignage)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'note' => 'required|integer',
            'message' => 'required|string',
        ]);
        // dd($data);
        try {
            $data = Temoignage::find($temoignage);

            $data->nom = $request->nom;

            if ($request->hasFile('image')) {

                //get filename with extension
                $filenamewithextension = $request->file('image')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp13')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->note = $request->note;
            $data->message = $request->message;

            $data->update();
            return redirect()->back()->with('success', 'Témoignage mis à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy($temoignage)
    {
        $temoignages = Temoignage::find($temoignage);
        try {
            $temoignages->delete();
            return redirect()->back()->with('success', 'Témoignage supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
