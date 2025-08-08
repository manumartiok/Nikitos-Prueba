<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class NikitoUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'nikito_users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pedidos()
    {
    return $this->hasMany(Pedido::class, 'nikito_user_id');
    }
}