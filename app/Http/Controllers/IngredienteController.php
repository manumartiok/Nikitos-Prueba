<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receta;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientes=Ingrediente::with('receta')->orderby('recetas_id')->get();
    return view('content.pages.ingredientes',['ingrediente'=>$ingredientes]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recetas=Receta::where('active',true)->get();
        return view('content.pages.ingredientes-create', ['receta'=>$recetas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredientes= new Ingrediente();
        $ingredientes->recetas_id=$request->recetas_id;
        $ingredientes->ingrediente=$request->ingrediente;

        $ingredientes->save();
    return redirect()->route('pages-ingredientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ingredientes_id)
    {
        $ingredientes=Ingrediente::find($ingredientes_id);
        $recetas=Receta::where('active',true)->get();
        return view('content.pages.ingredientes-show', ['ingrediente'=>$ingredientes, 'receta'=>$recetas]);
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
        $ingredientes = Ingrediente::find($request->ingredientes_id);
        $ingredientes->recetas_id=$request->recetas_id;
        $ingredientes->ingrediente=$request->ingrediente;

        $ingredientes->save();             
        return redirect()->route('pages-ingredientes');
    }

    public function destroy($ingredientes_id){
        $ingredientes = Ingrediente::find($ingredientes_id);
        $ingredientes->delete();
        return redirect()->route('pages-ingredientes');
    }
      

    public function switch($ingredientes_id){
        $ingredientes=Ingrediente::find($ingredientes_id);
        $ingredientes->active= !$ingredientes->active;
        $ingredientes->save();
        return redirect()->route('pages-ingredientes');
      }
}