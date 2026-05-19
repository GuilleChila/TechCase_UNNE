<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
      use SoftDeletes;

     protected $fillable = [
        'descripcionProducto',
        'modeloProducto',
        'precioProducto',
        'stockProducto',
        'categoria_id',  
    ];
}
