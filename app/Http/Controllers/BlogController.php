<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.add');
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
            'titre' => 'required|string',
            'descriptionCourte' => 'required|string',
            'description1' => 'required|string'
        ]);

        try {
            $data = new Blog();
            $data->titre = $request->titre;
            $data->descriptionCourte = $request->descriptionCourte;
            $data->description1 = $request->description1;
            $data->description2 = $request->description2;
            
            if ($request->hasFile('image1') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image1')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image1')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp26')->put($filenametostore, fopen($request->file('image1'), 'r+'));

                //Upload name to database
                $data->image1 = $filenametostore;
            }

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
                Storage::disk('ftp26')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

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
                Storage::disk('ftp26')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            $data->description3 = $request->description3;
            $data->description4 = $request->description4;

            if ($request->hasFile('video1') ) {

                //get filename with extension
                $filenamewithextension = $request->file('video1')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('video1')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp27')->put($filenametostore, fopen($request->file('video1'), 'r+'));

                //Upload name to database
                $data->video1 = $filenametostore;
            }

            if ($request->hasFile('video2') ) {

                //get filename with extension
                $filenamewithextension = $request->file('video2')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('video2')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp27')->put($filenametostore, fopen($request->file('video2'), 'r+'));

                //Upload name to database
                $data->video2 = $filenametostore;
            }

            $data->description5 = $request->description5;

            $data->save();
            return redirect()->back()->with('success', 'Le blog a été ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($blog)
    {
        $blogs = Blog::find($blog);

        return view('blog.update', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog)
    {
        $data = $request->validate([
            'titre' => 'required|string',
            'descriptionCourte' => 'required|string',
            'description1' => 'required|string'
        ]);

        try {
            $data = Blog::find($blog);
            $data->titre = $request->titre;
            $data->descriptionCourte = $request->descriptionCourte;
            $data->description1 = $request->description1;
            $data->description2 = $request->description2;
            
            if ($request->hasFile('image1') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image1')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image1')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp26')->put($filenametostore, fopen($request->file('image1'), 'r+'));

                //Upload name to database
                $data->image1 = $filenametostore;
            }

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
                Storage::disk('ftp26')->put($filenametostore, fopen($request->file('image2'), 'r+'));

                //Upload name to database
                $data->image2 = $filenametostore;
            }

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
                Storage::disk('ftp26')->put($filenametostore, fopen($request->file('image3'), 'r+'));

                //Upload name to database
                $data->image3 = $filenametostore;
            }

            $data->description3 = $request->description3;
            $data->description4 = $request->description4;

            if ($request->hasFile('video1') ) {

                //get filename with extension
                $filenamewithextension = $request->file('video1')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('video1')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp27')->put($filenametostore, fopen($request->file('video1'), 'r+'));

                //Upload name to database
                $data->video1 = $filenametostore;
            }

            if ($request->hasFile('video2') ) {

                //get filename with extension
                $filenamewithextension = $request->file('video2')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('video2')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp27')->put($filenametostore, fopen($request->file('video2'), 'r+'));

                //Upload name to database
                $data->video2 = $filenametostore;
            }

            $data->description5 = $request->description5;

            $data->update();
            return redirect()->back()->with('success', 'Le blog a été mis à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy( $blog)
    {
        $blogs = Blog::find($blog);
        try {
            $blogs->delete();
            return redirect()->back()->with('success','Le blog a été supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
