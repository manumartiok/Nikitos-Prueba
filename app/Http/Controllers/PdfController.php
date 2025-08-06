<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
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
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show($listas_id=null)
    {
        $listas=Pdf::first();

        if(!$listas){
            $listas= new Pdf();
        }
        return view ('content.pages.listaprecio-show' , ['lista'=>$listas]);
    }

    public function update(Request $request)
    {
            $listas= Pdf::find($request->lista_id);
        
        if(!$listas){
            $listas=new Pdf();
        }

            $listas->nombre=$request->nombre;
             // Si hay archivo nuevo, lo guardamos
            if ($request->hasFile('archivo')) {
                $ruta = $request->file('archivo')->store('pdfs', 'public');
                $listas->archivo = $ruta;
    }

        $listas->save();

            return redirect()->route('pages-listaprecio-show', ['lista_id' => $listas->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
