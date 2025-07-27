<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparacion extends Model
{
    use HasFactory;

    public function receta()
    {
        return $this->belongsTo(Receta::class, 'recetas_id');
    }
}
