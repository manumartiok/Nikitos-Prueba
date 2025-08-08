<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;


class HistoricoController extends Controller
{
    public function index($user_id)
{
    $user = Auth::guard('nikitos_user')->user();

    if (!$user || $user->id != $user_id) {
        // Si el usuario no está logueado o intenta ver otro ID, podés devolver 403 o redirigir
        abort(403, 'No autorizado para ver este contenido.');
    }

    $pedidos = Pedido::with('productos', 'trabajador')
        ->where('nikito_user_id', $user_id)
        ->get();

    return view('content.web.historico', compact('pedidos'));
}
}
