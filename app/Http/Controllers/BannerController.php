<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
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
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show($banners_id=null)
    {
        $banners=Banner::first();

        if(!$banners){
            $banners= new Banner();
        }
        return view ('content.pages.banner-show' , ['banner'=>$banners]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $banners= Banner::find($request->banner_id);
        
        if(!$banners){
            $banners=new Banner();
        }

            $banners->producto_titulo=$request->producto_titulo;
            $banners->ubicacion_titulo=$request->ubicacion_titulo;
            $banners->recetas_titulo=$request->recetas_titulo;
            $banners->nosotros_titulo=$request->nosotros_titulo;
            $banners->contacto_titulo=$request->contacto_titulo;

            // Cargar las imágenes y guardar sus rutas
        if ($request->hasFile('producto_foto')) {
            $file = $request->file('producto_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $banners->producto_foto = Storage::url($filePath);  // Guarda la URL pública
        }

        if ($request->hasFile('ubicacion_foto')) {
            $file = $request->file('ubicacion_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $banners->ubicacion_foto = Storage::url($filePath);  // Guarda la URL pública
        }

        if ($request->hasFile('recetas_foto')) {
            $file = $request->file('recetas_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $banners->recetas_foto = Storage::url($filePath);  // Guarda la URL pública
        }

        if ($request->hasFile('nosotros_foto')) {
            $file = $request->file('nosotros_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $banners->nosotros_foto = Storage::url($filePath);  // Guarda la URL pública
        }

        if ($request->hasFile('contacto_foto')) {
            $file = $request->file('contacto_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $banners->contacto_foto = Storage::url($filePath);  // Guarda la URL pública
        }

        $banners->save();

        return redirect()->route('pages-banner-show', ['banner_id' => $banners->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
