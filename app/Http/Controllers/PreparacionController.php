<?php

namespace App\Http\Controllers;

use App\Models\Preparacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receta;
use Illuminate\Support\Facades\Storage;

class PreparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preparacion=Preparacion::with('receta')->orderby('recetas_id')->get();
    return view('content.pages.preparacion',['preparacion'=>$preparacion]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recetas=Receta::where('active',true)->get();
        return view('content.pages.preparacion-create', ['receta'=>$recetas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preparacion= new Preparacion();
        $preparacion->recetas_id=$request->recetas_id;
        $preparacion->nro_paso=$request->nro_paso;
        $preparacion->texto_paso=$request->texto_paso;

        $preparacion->save();
    return redirect()->route('pages-preparacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($preparacion_id)
    {
        $preparacion=Preparacion::find($preparacion_id);
        $recetas=Receta::where('active',true)->get();
        return view('content.pages.preparacion-show', ['preparacion'=>$preparacion, 'receta'=>$recetas]);
      }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $preparacion = Preparacion::find($request->preparacion_id);
        $preparacion->recetas_id=$request->recetas_id;
        $preparacion->nro_paso=$request->nro_paso;
        $preparacion->texto_paso=$request->texto_paso;

        $preparacion->save();             
        return redirect()->route('pages-preparacion');
    }

    public function destroy($preparacion_id){
        $preparacion = Preparacion::find($preparacion_id);
        $preparacion->delete();
        return redirect()->route('pages-preparacion');
    }
      

    public function switch($preparacion_id){
        $preparacion=Preparacion::find($preparacion_id);
        $preparacion->active= !$preparacion->active;
        $preparacion->save();
        return redirect()->route('pages-preparacion');
      }
}