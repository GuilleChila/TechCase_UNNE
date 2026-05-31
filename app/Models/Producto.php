<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
      use SoftDeletes;
    protected $table = 'productos';
     protected $fillable = [
        'nombre',
        'modelo',
        'precio',
        'stock',
        'imagen',
        'categoria_id',  
        'disenos',
        'marca',
        'amperaje',
    ];
}
