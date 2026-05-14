<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use SoftDeletes;

     protected $table = "categoria_productos";
     protected $primarykey='Categoria_id'
     public $incrementing = false;
     protected $keytype = "int";

     protected $fillable = [
        'Categoria_id',
        'NombreCategoria',
        
    ];
}
