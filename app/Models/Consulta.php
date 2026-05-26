<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Consulta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'motivo',
        'mensaje'
    ];

    protected function casts(): array
    {
        return [
            'nombre'  => 'string',
            'correo'  => 'string',
            'telefono' => 'string',
            'motivo'  => 'string',
            'mensaje' => 'string',
            'created_at' => 'datetime',
        ];
    }

}
