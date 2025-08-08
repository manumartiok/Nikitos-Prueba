<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'categoria_productos_id');
    }

    public function pedidos()
    {
    return $this->belongsToMany(Pedido::class, 'pedido_productos')
                ->withPivot('cantidad')
                ->withTimestamps();
    }
}
