<?php

namespace App\Http\Controllers;

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
        $popups = DB::table('pays')
            ->join('pop_ups', 'pays.id', '=', 'pop_ups.pays_id')
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
        return view('popup.add', compact('pays'));
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
            'pays_id'=>'required|integer',
            'image'=>'required|file'
        ]);

        try {
            $data = new PopUp();

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $image = $request->file('image')->storeAs('Popup', $filename, 'public');
            //     $data->image = $image;
            // }

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
                Storage::disk('ftp28')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

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
        return view('popup.update', compact('popups', 'pays'));
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
            'pays_id'=>'required|integer',
        ]);

        try {
            $data = PopUp::find($popup);

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $image = $request->file('image')->storeAs('Popup', $filename, 'public');
            //     $data->image = $image;
            // }

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
                Storage::disk('ftp28')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

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
            $data -> delete();
            return redirect()->back()->with('success', 'Popup supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
