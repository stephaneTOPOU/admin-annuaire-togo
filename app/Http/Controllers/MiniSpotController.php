<?php

namespace App\Http\Controllers;

use App\Models\MiniSpot;
use App\Models\Pays;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MiniSpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minspots = DB::table('pays')
            ->join('mini_spots', 'pays.id', '=', 'mini_spots.pays_id')
            ->join('admins', 'admins.id', '=', 'mini_spots.admin_id')
            ->select('*', 'admins.name as admin', 'mini_spots.id as identifiant')
            ->get();
        return view('mini-spot.index', compact('minspots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        return view('mini-spot.add', compact('pays'));
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
            'video'=>'required|file',
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = new MiniSpot();

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            
            // if ($request->video) {
            //     $filename = time() . rand(1, 50) . '.' . $request->video->extension();
            //     $video = $request->file('video')->storeAs('MiniSpot', $filename, 'public');
            //     $data->video = $video;
            // }

            if ($request->hasFile('video') ) {

                //get filename with extension
                $filenamewithextension = $request->file('video')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('video')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp19')->put($filenametostore, fopen($request->file('video'), 'r+'));

                //Upload name to database
                $data->video = $filenametostore;
            }

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
                Storage::disk('ftp20')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->save();
            return redirect()->back()->with('success', 'minispot ajouté avec succès');
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
    public function edit($minspot)
    {
        $minspots = MiniSpot::find($minspot);
        $pays = Pays::all();
        return view('mini-spot.update', compact('minspots', 'pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $minspot)
    {
        $data = $request->validate([
            'video'=>'required|file',
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = MiniSpot::find($minspot);

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            
            // if ($request->video) {
            //     $filename = time() . rand(1, 50) . '.' . $request->video->extension();
            //     $video = $request->file('video')->storeAs('MiniSpot', $filename, 'public');
            //     $data->video = $video;
            // }

            if ($request->hasFile('video') ) {

                //get filename with extension
                $filenamewithextension = $request->file('video')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('video')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp19')->put($filenametostore, fopen($request->file('video'), 'r+'));

                //Upload name to database
                $data->video = $filenametostore;
            }

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
                Storage::disk('ftp20')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->update();
            return redirect()->back()->with('success', 'minispot mis à jour avec succès');
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
