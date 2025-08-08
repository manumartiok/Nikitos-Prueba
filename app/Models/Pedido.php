<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
    'nikito_user_id',
    'fecha_pedido',
    'localidad',
    'razon_social',
    'codigo_cliente',
    'observaciones',
    'archivo',
    'horario',
    'condiciones_pago',
];

    public function trabajador()
    {
    return $this->belongsTo(NikitoUser::class, 'nikito_user_id');
    }

    public function productos()
    {
    return $this->belongsToMany(Producto::class, 'pedido_productos')
                ->withPivot('cantidad')
                ->withTimestamps();
    }
}
