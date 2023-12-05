<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\SliderLateralBas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderLateralBasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = DB::table('pays')
        ->join('slider_lateral_bas', 'pays.id', '=', 'slider_lateral_bas.pays_id')
        ->join('admins', 'admins.id', '=', 'slider_lateral_bas.admin_id')
        ->select('*', 'admins.name as admin', 'slider_lateral_bas.id as identifiant')
        ->get();
        
        return view('slider-lateral-bas.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        return view('slider-lateral-bas.add', compact('pays'));
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
            'image'=>'required|file|max:1024',
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = new SliderLateralBas();

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $img = $request->file('image')->storeAs('sliders', $filename, 'public');
            //     $data->image = $img;
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
                Storage::disk('ftp17')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->save();
            return redirect()->back()->with('success', 'Image Ajoutée avec succès');
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
    public function edit($slider)
    {
        $sliders = SliderLateralBas::find($slider);
        $pays = Pays::all();
        return view('slider-lateral-bas.update', compact('sliders', 'pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider)
    {
        //dd($request);
        $data = $request->validate([
            'image'=>'required|file|max:1024',
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = SliderLateralBas::find($slider);

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $img = $request->file('image')->storeAs('sliders', $filename, 'public');
            //     $data->image = $img;
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
                Storage::disk('ftp17')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->update();
            return redirect()->back()->with('success', 'Image mise à jour avec succès');
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
    public function destroy($slider)
    {
        $sliders = SliderLateralBas::find($slider);
        try {
            $sliders->delete();
            return redirect()->back()->with('success', 'Image supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
