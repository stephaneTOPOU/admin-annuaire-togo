<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->join('services', 'entreprises.id', '=', 'services.entreprise_id')
            ->select('*', 'entreprises.nom as entreprise', 'services.id as identifiant', 'pays.libelle as pays')
            ->get();

        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entreprises = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'entreprises.nom as entreprise', 'pays.libelle as pays')
            ->get();

        return view('service.add', compact('entreprises'));
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
            'entreprise_id' => 'required|integer'
        ]);

        try {
            $data = new Service();
            $data->entreprise_id = $request->entreprise_id;
            $data->libelle = $request->libelle;
            $data->description = $request->description;
            $data->image1 = $request->image1;

            // if ($request->image2) {
            //     $filename2 = time() . rand(1, 50) . '.' . $request->image2->extension();
            //     $img2 = $request->file('image2')->storeAs('ServiceImage', $filename2, 'public');
            //     $data->image2 = $img2;
            // }

            if ($request->hasFile('image2') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image2')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image2')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp14')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

            // if ($request->image3) {
            //     $filename3 = time() . rand(1, 50) . '.' . $request->image3->extension();
            //     $img3 = $request->file('image3')->storeAs('ServiceImage', $filename3, 'public');
            //     $data->image3 = $img3;
            // }

            if ($request->hasFile('image3') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image3')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image3')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp14')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            $data->image5 = $request->image5;

            $data->save();
            return redirect()->back()->with('success', 'Service Ajouté avec succès');
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
    public function edit($service)
    {
        $services = Service::find($service);
        $entreprises = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'entreprises.nom as entreprise', 'pays.libelle as pays')
            ->get();
        return view('service.update', compact('entreprises', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service)
    {
        $data = $request->validate([
            'entreprise_id' => 'required|integer'
        ]);

        try {
            $data = Service::find($service);
            $data->entreprise_id = $request->entreprise_id;
            $data->libelle = $request->libelle;
            $data->description = $request->description;
            $data->image1 = $request->image1;

            // if ($request->image2) {
            //     $filename2 = time() . rand(1, 50) . '.' . $request->image2->extension();
            //     $img2 = $request->file('image2')->storeAs('ServiceImage', $filename2, 'public');
            //     $data->image2 = $img2;
            // }

            if ($request->hasFile('image2') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image2')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image2')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp14')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

            // if ($request->image3) {
            //     $filename3 = time() . rand(1, 50) . '.' . $request->image3->extension();
            //     $img3 = $request->file('image3')->storeAs('ServiceImage', $filename3, 'public');
            //     $data->image3 = $img3;
            // }

            if ($request->hasFile('image3') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image3')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image3')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp14')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            $data->image5 = $request->image5;

            $data->update();
            return redirect()->back()->with('success', 'Service modifié avec succès');
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
    public function destroy($service)
    {
        $services = Service::find($service);
        try {
            $services->delete();
            return redirect()->back()->with('success', 'Service supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
