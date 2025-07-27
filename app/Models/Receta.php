<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

       public function ingredientes()
{
    return $this->hasMany(Ingrediente::class, 'receta_id');
}

   public function preparacion()
{
    return $this->hasMany(Preparacion::class, 'receta_id');

}

}
