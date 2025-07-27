<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas=Receta::all();
    return view('content.pages.receta',['receta'=>$recetas]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.receta-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recetas= new Receta();
        $recetas->receta_nombre=$request->receta_nombre;
        $recetas->receta_preparacion=$request->receta_preparacion;
        $recetas->receta_coccion=$request->receta_coccion;
        $recetas->receta_porciones=$request->receta_porciones;

        if ($request->hasFile('receta_foto')) {
            $file = $request->file('receta_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $recetas->receta_foto = Storage::url($filePath);  // Guarda la URL pública
        }

        $recetas->save();
    return redirect()->route('pages-receta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($recetas_id)
    {
        $recetas=Receta::find($recetas_id);
        return view('content.pages.receta-show' ,['receta'=>$recetas]);
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
        $recetas= Receta::find($request->receta_id);
        $recetas->receta_nombre=$request->receta_nombre;
        $recetas->receta_preparacion=$request->receta_preparacion;
        $recetas->receta_coccion=$request->receta_coccion;
        $recetas->receta_porciones=$request->receta_porciones;

        if ($request->hasFile('receta_foto')) {
            $file = $request->file('receta_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $recetas->receta_foto = Storage::url($filePath);  // Guarda la URL pública
        }
        $recetas->save();             
        return redirect()->route('pages-receta');
    }

    public function destroy($recetas_id){
        $recetas = Receta::find($recetas_id);

        if ($recetas) {
        // Obtener la ruta de la imagen
        $imagePath = str_replace('/storage/', 'public/', $recetas->receta_foto); // Convierte la URL a la ruta de almacenamiento
        
        // Eliminar la imagen del sistema de archivos
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
    
        $recetas->delete();
    }
        
        return redirect()->route('pages-receta');
    }
      

    public function switch($recetas_id){
        $recetas=Receta::find($recetas_id);
        $recetas->active= !$recetas->active;
        $recetas->save();
        return redirect()->route('pages-receta');
      }
}
