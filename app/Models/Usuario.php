<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
   use Notifiable;
   protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
        'documento',
        'correo',
        'contrasenia',
        'estado',
        'perfil_id'
    ];

    public function getAuthPassword()
    {
        return $this->contrasenia;
    }
}
