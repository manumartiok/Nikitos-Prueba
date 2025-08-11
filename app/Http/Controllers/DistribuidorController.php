<?php

namespace App\Http\Controllers;

use App\Models\Distribuidor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $distribuidores=Distribuidor::all();
    return view('content.pages.distribuidores',['distribuidor'=>$distribuidores]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.distribuidores-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distribuidores= new Distribuidor();
        $distribuidores->nombre=$request->nombre;
        $distribuidores->provincia=$request->provincia;
        $distribuidores->ciudad=$request->ciudad;
        $distribuidores->latitud=$request->latitud;
        $distribuidores->longitud=$request->longitud;

        $distribuidores->save();
    return redirect()->route('pages-distribuidores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($distribuidores_id)
    {
        $distribuidores=Distribuidor::find($distribuidores_id);
        return view('content.pages.distribuidores-show' ,['distribuidor'=>$distribuidores]);
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
        $distribuidores = Distribuidor::find($request->distribuidor_id);
        $distribuidores->nombre=$request->nombre;
        $distribuidores->provincia=$request->provincia;
        $distribuidores->ciudad=$request->ciudad;
        $distribuidores->latitud=$request->latitud;
        $distribuidores->longitud=$request->longitud;
        
        $distribuidores->save();             
        return redirect()->route('pages-distribuidores');
    }

    public function destroy($distribuidores_id){
        $distribuidores = Distribuidor::find($distribuidores_id);
    
        $distribuidores->delete();
        return redirect()->route('pages-distribuidores');
    }
      

    public function switch($distribuidores_id){
        $distribuidores=Distribuidor::find($distribuidores_id);
        $distribuidores->active= !$distribuidores->active;
        $distribuidores->save();
        return redirect()->route('pages-distribuidores');
      }
}
