<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=CategoriaProducto::all();
    return view('content.pages.categoria',['categoria'=>$categorias]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.categoria-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias= new CategoriaProducto();
        $categorias->nombre_categoria=$request->nombre_categoria;
        $categorias->color_categoria=$request->color_categoria;

        if ($request->hasFile('foto_categoria')) {
            $file = $request->file('foto_categoria');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $categorias->foto_categoria = Storage::url($filePath);  // Guarda la URL pública
        }

        $categorias->save();
    return redirect()->route('pages-categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categorias_id)
    {
        $categorias=CategoriaProducto::find($categorias_id);
        return view('content.pages.categoria-show' ,['categoria'=>$categorias]);
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
        $categorias = CategoriaProducto::find($request->categoria_id);
        $categorias->nombre_categoria=$request->nombre_categoria;
        $categorias->color_categoria=$request->color_categoria;

        if ($request->hasFile('foto_categoria')) {
            $file = $request->file('foto_categoria');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $categorias->foto_categoria = Storage::url($filePath);  // Guarda la URL pública
        }
        $categorias->save();             
        return redirect()->route('pages-categoria');
    }

    public function destroy($categorias_id){
        $categorias = CategoriaProducto::find($categorias_id);
    
        $categorias->delete();
        
        return redirect()->route('pages-categoria');
    }
      

    public function switch($categorias_id){
        $categorias=CategoriaProducto::find($categorias_id);
        $categorias->active= !$categorias->active;
        $categorias->save();
        return redirect()->route('pages-categoria');
      }
}


