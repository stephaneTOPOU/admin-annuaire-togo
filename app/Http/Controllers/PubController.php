<?php

namespace App\Http\Controllers;

use App\Models\Pub;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pubs = Pub::all();
        return view('pub.index', compact('pubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pub.add');
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
            'entreprise' => 'required|string',
            'titre' => 'required|string',
            'sousTitre' => 'required|string'
        ]);

        try {
            $data = new Pub();
            $data->entreprise = $request->entreprise;
            $data->titre = $request->titre;
            $data->sousTitre = $request->sousTitre;
            $data->description = $request->description;
            $data->detail = $request->detail;

            if ($request->hasFile('image1')) {

                //get filename with extension
                $filenamewithextension = $request->file('image1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image1'), 'r+'));

                //Upload name to database
                $data->image1 = $filenametostore;
            }

            if ($request->hasFile('image2')) {

                //get filename with extension
                $filenamewithextension = $request->file('image2')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image2')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

            if ($request->hasFile('image3')) {

                //get filename with extension
                $filenamewithextension = $request->file('image3')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image3')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            if ($request->hasFile('image4')) {

                //get filename with extension
                $filenamewithextension = $request->file('image4')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image4')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image4'), 'r+'));

                //Upload name to database
                $data->image4 = $filenametostore;
            }

            if ($request->hasFile('image5')) {

                //get filename with extension
                $filenamewithextension = $request->file('image5')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image5')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image5'), 'r+'));

                //Upload name to database
                $data->image5 = $filenametostore;
            }

            if ($request->hasFile('image6')) {

                //get filename with extension
                $filenamewithextension = $request->file('image6')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image6')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image6'), 'r+'));

                //Upload name to database
                $data->image6 = $filenametostore;
            }

            $data->save();
            return redirect()->back()->with('success', 'Publicité Ajoutée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function show(Pub $pub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function edit($pub)
    {
        $pubs = Pub::find($pub);

        return view('pub.update', compact('pubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pub)
    {
        $data = $request->validate([
            'entreprise' => 'required|string',
            'titre' => 'required|string',
            'sousTitre' => 'required|string'
        ]);

        try {
            $data = Pub::find($pub);
            $data->entreprise = $request->entreprise;
            $data->titre = $request->titre;
            $data->sousTitre = $request->sousTitre;
            $data->description = $request->description;
            $data->detail = $request->detail;

            if ($request->hasFile('image1')) {

                //get filename with extension
                $filenamewithextension = $request->file('image1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image1'), 'r+'));

                //Upload name to database
                $data->image1 = $filenametostore;
            }

            if ($request->hasFile('image2')) {

                //get filename with extension
                $filenamewithextension = $request->file('image2')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image2')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

            if ($request->hasFile('image3')) {

                //get filename with extension
                $filenamewithextension = $request->file('image3')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image3')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            if ($request->hasFile('image4')) {

                //get filename with extension
                $filenamewithextension = $request->file('image4')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image4')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image4'), 'r+'));

                //Upload name to database
                $data->image4 = $filenametostore;
            }

            if ($request->hasFile('image5')) {

                //get filename with extension
                $filenamewithextension = $request->file('image5')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image5')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image5'), 'r+'));

                //Upload name to database
                $data->image5 = $filenametostore;
            }

            if ($request->hasFile('image6')) {

                //get filename with extension
                $filenamewithextension = $request->file('image6')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('image6')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp10')->put($filenametostore, fopen($request->file('image6'), 'r+'));

                //Upload name to database
                $data->image6 = $filenametostore;
            }

            $data->update();
            return redirect()->back()->with('success', 'Publicité Ajoutée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function destroy($pub)
    {
        $pubs = Pub::find($pub);
        try {
            $pubs->delete();
            return redirect()->back()->with('success', 'Publicité supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
