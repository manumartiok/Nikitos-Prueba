<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::with('categoria')->orderby('categoria_productos_id')->get();
    return view('content.pages.producto',['producto'=>$productos]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=CategoriaProducto::where('active',true)->get();
        return view('content.pages.producto-create', ['categoria'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos= new Producto();
        $productos->categoria_productos_id=$request->categoria_productos_id;
        $productos->producto_nombre=$request->producto_nombre;
        $productos->producto_descripcion=$request->producto_descripcion;
        $productos->producto_codigo=$request->producto_codigo;
        $productos->producto_tamaños=$request->producto_tamaños;
        $productos->producto_vida=$request->producto_vida;

        if ($request->hasFile('producto_foto')) {
            $file = $request->file('producto_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $productos->producto_foto = Storage::url($filePath);  // Guarda la URL pública
        }

        $productos->save();
    return redirect()->route('pages-producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productos_id)
    {
        $productos=Producto::find($productos_id);
        $categorias=CategoriaProducto::where('active',true)->get();
        return view('content.pages.producto-show', ['producto'=>$productos, 'categoria'=>$categorias]);
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
        $productos = Producto::find($request->producto_id);
        $productos->categoria_productos_id=$request->categoria_productos_id;
        $productos->producto_nombre=$request->producto_nombre;
        $productos->producto_descripcion=$request->producto_descripcion;
        $productos->producto_codigo=$request->producto_codigo;
        $productos->producto_tamaños=$request->producto_tamaños;
        $productos->producto_vida=$request->producto_vida;

        if ($request->hasFile('producto_foto')) {
            $file = $request->file('producto_foto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $productos->producto_foto = Storage::url($filePath);  // Guarda la URL pública
        }
        $productos->save();             
        return redirect()->route('pages-producto');
    }

    public function destroy($productos_id){
        $productos = Producto::find($productos_id);

        if ($productos) {
        // Obtener la ruta de la imagen
        $imagePath = str_replace('/storage/', 'public/', $productos->producto_foto); // Convierte la URL a la ruta de almacenamiento
        
        // Eliminar la imagen del sistema de archivos
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
    
        $productos->delete();
    }
        
        return redirect()->route('pages-producto');
    }
      

    public function switch($productos_id){
        $productos=Producto::find($productos_id);
        $productos->active= !$productos->active;
        $productos->save();
        return redirect()->route('pages-producto');
      }
}