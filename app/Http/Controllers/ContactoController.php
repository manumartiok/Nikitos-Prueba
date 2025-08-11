<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactoController extends Controller
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
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show($contactos_id=null)
    {
        $contactos=Contacto::first();

        if(!$contactos){
            $contactos= new Contacto();
        }
        return view ('content.pages.contacto-show' , ['contacto'=>$contactos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contactos= Contacto::find($request->contacto_id);
        
        if(!$contactos){
            $contactos=new Contacto();
        }

            $contactos->ubicacion=$request->ubicacion;
            $contactos->ubicacion_link=$request->ubicacion_link;
            $contactos->telefono=$request->telefono;
            $contactos->mail=$request->mail;
            $contactos->horarios=$request->horarios;
            $contactos->latitud=$request->latitud;
            $contactos->longitud=$request->longitud;

        $contactos->save();

        return redirect()->route('pages-contacto-show', ['contacto_id' => $contactos->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
