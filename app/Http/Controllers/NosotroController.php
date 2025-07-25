<?php

namespace App\Http\Controllers;

use App\Models\Nosotro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NosotroController extends Controller
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
     * @param  \App\Models\Nosotro  $nosotro
     * @return \Illuminate\Http\Response
     */
    public function show($nosotros_id=null)
    {
        $nosotros=Nosotro::first();

        if(!$nosotros){
            $nosotros= new Nosotro();
        }
        return view ('content.pages.nosotros-show' , ['nosotros'=>$nosotros]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nosotro  $nosotro
     * @return \Illuminate\Http\Response
     */
    public function edit(Nosotro $nosotro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nosotro  $nosotro
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {
        $nosotros= Nosotro::find($request->nosotros_id);
        
        if(!$nosotros){
            $nosotros=new Nosotro();
        }

            $nosotros->texto1=$request->texto1;
            $nosotros->descripcion1=$request->descripcion1;
            $nosotros->texto2=$request->texto2;
            $nosotros->descripcion2=$request->descripcion2;
            $nosotros->texto3=$request->texto3;
            $nosotros->descripcion3=$request->descripcion3;
            $nosotros->texto4=$request->texto4;
            $nosotros->descripcion4=$request->descripcion4;

            // Cargar las imágenes y guardar sus rutas
        if ($request->hasFile('foto1')) {
            $file = $request->file('foto1');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $nosotros->foto1 = Storage::url($filePath);  // Guarda la URL pública
        }

        
        if ($request->hasFile('foto2')) {
            $file = $request->file('foto2');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $nosotros->foto2 = Storage::url($filePath);  
        }

        if ($request->hasFile('foto3')) {
            $file = $request->file('foto3');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $nosotros->foto3 = Storage::url($filePath);  // Guarda la URL pública
        }


        if ($request->hasFile('foto4')) {
            $file = $request->file('foto4');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $nosotros->foto4 = Storage::url($filePath);  // Guarda la URL pública
        }


        $nosotros->save();

        return redirect()->route('pages-nosotros-show', ['nosotros_id' => $nosotros->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nosotro  $nosotro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nosotro $nosotro)
    {
        //
    }
}
