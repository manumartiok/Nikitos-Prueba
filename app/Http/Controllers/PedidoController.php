<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\NikitoUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $pedidos=Pedido::with('productos', 'trabajador')->get();
    return view('content.pages.pedidos',['pedido'=>$pedidos]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedidos= new Pedido();
        $pedidos->nikito_user_id = Auth::guard('nikitos_user')->id();
        $pedidos->fecha_pedido=$request->fecha_pedido;
        $pedidos->localidad=$request->localidad;
        $pedidos->horario=$request->horario;
        $pedidos->razon_social=$request->razon_social;
        $pedidos->codigo_cliente=$request->codigo_cliente;
        $pedidos->condiciones_pago=$request->condiciones_pago;
        $pedidos->observaciones=$request->observaciones;

        if ($request->hasFile('archivo')) {
        $archivo = $request->file('archivo');
        $nombreArchivo = time().'_'.$archivo->getClientOriginalName();
        $ruta = $archivo->storeAs('archivos', $nombreArchivo, 'public');
        $pedidos->archivo = $ruta;
}

        $pedidos->save();
        // Asociar productos con cantidad
        foreach ($request->cantidad as $producto_id => $cantidad) {
            if (in_array($producto_id, $request->productos_seleccionados ?? []) && $cantidad > 0) {
                $pedidos->productos()->attach($producto_id, ['cantidad' => $cantidad]);
            }
        }
        

    return redirect()->route('historico', ['user_id' => Auth::guard('nikitos_user')->id()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pedidos_id)
    {
        $pedidos=Pedido::find($pedidos_id);
        $pedidos->load('productos', 'trabajador');
        return view('content.pages.pedidos-show', ['pedido'=>$pedidos]);
      }

    public function update(Request $request)
    {
        $pedidos = Pedido::find($request->pedidos_id);
        $pedidos->nikito_user_id = Auth::guard('nikitos_user')->id();
        $pedidos->fecha_pedido=$request->fecha_pedido;
        $pedidos->localidad=$request->localidad;
        $pedidos->horario=$request->horario;
        $pedidos->razon_social=$request->razon_social;
        $pedidos->codigo_cliente=$request->codigo_cliente;
        $pedidos->condiciones_pago=$request->condiciones_pago;
        $pedidos->observaciones=$request->observaciones;

        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time().'_'.$archivo->getClientOriginalName();
            $ruta = $archivo->storeAs('archivos', $nombreArchivo, 'public');
            $pedidos->archivo = $ruta;
}

         // Sincronizar productos y cantidades
        $syncData = [];
        foreach ($request->cantidad as $producto_id => $cantidad) {
            if (
                in_array($producto_id, $request->productos_seleccionados ?? []) &&
                $cantidad > 0
            ) {
                $syncData[$producto_id] = ['cantidad' => $cantidad];
            }
        }

        $pedidos->productos()->sync($syncData);

        $pedidos->save();             
        return redirect()->route('pages-pedidos');
    }

    public function destroy($pedidos_id){
        $pedidos = Pedido::find($pedidos_id);
        $pedidos->delete();
        return redirect()->route('pages-pedidos');
    }
      

    public function switch($pedidos_id){
        $pedidos=Pedido::find($pedidos_id);
        $pedidos->active= !$pedidos->active;
        $pedidos->save();
        return redirect()->route('pages-pedidos');
    }

    public function generarPdf($pedidos_id){
        $pedidos = Pedido::findOrFail($pedidos_id);
        $pedidos->load('productos', 'trabajador');

        $pdf = PDF::loadView('content.web.pdf', compact('pedidos'));
        return $pdf->download('pedido_' . $pedidos->id . '.pdf');
    }

    public function repetir($pedidos_id)
{
    $pedidos = Pedido::with('productos')->findOrFail($pedidos_id);

    // Si querés, acá podés pasar directamente los productos con sus cantidades
    $productosSeleccionados = [];
    foreach ($pedidos->productos as $producto) {
        $productosSeleccionados[$producto->id] = $producto->pivot->cantidad;
    }

    return view('content.web.pedido', compact('pedidos', 'productosSeleccionados'))->with('pedidoOriginal', $pedidos);
}
}
