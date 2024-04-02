<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pays;
use App\Models\Slider1;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Slider1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider1s = DB::table('slider1s')
            ->join('admins', 'admins.id', '=', 'slider1s.admin_id')
            ->select('*', 'admins.name as admin', 'slider1s.id as identifiant')
            ->get();

        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('slider1.index', compact('slider1s', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('slider1.add', compact('fonctions'));
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
            'image' => 'required|file|max:1024',
        ]);

        try {
            $data = new Slider1();

            $data->admin_id =  Auth::user()->id;

            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $img = $request->file('image')->storeAs('sliders', $filename, 'public');
            //     $data->image = $img;
            // }

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
                Storage::disk('ftp17')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->save();
            return redirect()->back()->with('success', 'Slider Ajoutée avec succès');
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
    public function edit($slider1)
    {
        $slider1s = Slider1::find($slider1);
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('slider1.update', compact('slider1s', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider1)
    {
        $data = $request->validate([
            'image' => 'required|file|max:1024',
        ]);

        try {
            $data = Slider1::find($slider1);

            $data->admin_id =  Auth::user()->id;

            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $img = $request->file('image')->storeAs('sliders', $filename, 'public');
            //     $data->image = $img;
            // }

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
    public function destroy($slider1)
    {
        $slider1s = Slider1::find($slider1);
        try {
            $slider1s->delete();
            return redirect()->back()->with('success', 'Slider supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
