<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'documento',
        'correo',
        'contrasenia',
        'estado',
        'perfil_id'
    ];
}
