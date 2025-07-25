<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show($homes_id=null)
    {
        $homes=Home::first();

        if(!$homes){
            $homes= new Home();
        }
        return view ('content.pages.home-show' , ['home'=>$homes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $homes= Home::find($request->home_id);
        
        if(!$homes){
            $homes=new Home();
        }

            $homes->video_tmayor=$request->video_tmayor;
            $homes->video_tmenor=$request->video_tmenor;
            $homes->banner_tmayor=$request->banner_tmayor;
            $homes->banner_tmenor=$request->banner_tmenor;
            $homes->titulo1=$request->titulo1;
            $homes->titulo2=$request->titulo2;
            $homes->titulo3=$request->titulo3;

            // Cargar las imágenes y guardar sus rutas
        if ($request->hasFile('video')) {
            $file = $request->file('video');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $homes->video = Storage::url($filePath);  // Guarda la URL pública
        }

        
        if ($request->hasFile('banner_foto')) {
            $file = $request->file('banner_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $homes->banner_foto = Storage::url($filePath);  
        }

        $homes->save();

        return redirect()->route('pages-home-show', ['home_id' => $homes->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
