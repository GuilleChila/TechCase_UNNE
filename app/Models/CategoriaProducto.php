<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProducto extends Model
{
    use SoftDeletes;

     protected $table = "categoria_productos";
     protected $primarykey='categoria_id';
     public $incrementing = false;
     protected $keytype = "int";

     protected $fillable = [
        'categoria_id',
        'nombreCategoria',
        
    ];
}
