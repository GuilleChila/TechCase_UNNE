<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use SoftDeletes;
    
    protected $table = 'perfils';
    protected $primarykey='perfil_id'
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'perfil_id'
        'nombre_perfil'
    ];
}
