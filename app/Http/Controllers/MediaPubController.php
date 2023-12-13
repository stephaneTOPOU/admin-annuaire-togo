<?php

namespace App\Http\Controllers;

use App\Models\MediaPub;
use App\Models\Pub;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaPubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = DB::table('pubs')
            ->join('media_pubs', 'media_pubs.pubs_id', '=', 'pubs.id')
            ->select('*', 'pubs.entreprise as entreprise', 'media_pubs.id as identifiant')
            ->get();
        return view('media-pub.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pubs = Pub::all();
        return view('media-pub.add', compact('pubs'));
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
            'pubs_id' => 'required|integer',
        ]);

        try {
            $data = new MediaPub();
            $data->pubs_id = $request->pubs_id;
            
            if ($request->hasFile('imageSpot') ) {

                //get filename with extension
                $filenamewithextension = $request->file('imageSpot')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('imageSpot')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
        
                //Upload File to external server
                Storage::disk('ftp28')->put($filenametostore, fopen($request->file('imageSpot'), 'r+'));

                //Upload name to database
                $data->imageSpot = $filenametostore;
            }

            if ($request->hasFile('videoSpot') ) {

                //get filename with extension
                $filenamewithextension = $request->file('videoSpot')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('videoSpot')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
        
                //Upload File to external server
                Storage::disk('ftp28')->put($filenametostore, fopen($request->file('videoSpot'), 'r+'));

                //Upload name to database
                $data->videoSpot = $filenametostore;
            }
            
            $data->youtube = $request->youtube;

            $data->save();
            return redirect()->back()->with('success', 'Média Ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaPub  $mediaPub
     * @return \Illuminate\Http\Response
     */
    public function show(MediaPub $mediaPub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaPub  $mediaPub
     * @return \Illuminate\Http\Response
     */
    public function edit($mediaPub)
    {
        $pubs = Pub::all();

        $medias = MediaPub::find($mediaPub);

        return view('media-pub.update', compact('pubs', 'medias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaPub  $mediaPub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mediaPub)
    {
        $data = $request->validate([
            'pubs_id' => 'required|integer',
        ]);

        try {
            $data = MediaPub::find($mediaPub);

            $data->pubs_id = $request->pubs_id;
            
            if ($request->hasFile('imageSpot') ) {

                //get filename with extension
                $filenamewithextension = $request->file('imageSpot')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('imageSpot')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
        
                //Upload File to external server
                Storage::disk('ftp28')->put($filenametostore, fopen($request->file('imageSpot'), 'r+'));

                //Upload name to database
                $data->imageSpot = $filenametostore;
            }

            if ($request->hasFile('videoSpot') ) {

                //get filename with extension
                $filenamewithextension = $request->file('videoSpot')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('videoSpot')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
        
                //Upload File to external server
                Storage::disk('ftp28')->put($filenametostore, fopen($request->file('videoSpot'), 'r+'));

                //Upload name to database
                $data->videoSpot = $filenametostore;
            }
            
            $data->youtube = $request->youtube;

            $data->update();
            return redirect()->back()->with('success', 'Média mis à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaPub  $mediaPub
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaPub $mediaPub)
    {
        try {
            $mediaPub->delete();
            return redirect()->back()->with('success','Média supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
