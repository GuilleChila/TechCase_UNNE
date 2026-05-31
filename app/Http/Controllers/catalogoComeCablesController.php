<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class catalogoComeCablesController extends Controller
{
    public function index()
    {
        // Trae los productos de la BD de la categoría Comecables (3)
        $comeCables = Producto::where('categoria_id', 3)->get();

        return view('catalogo-comecables', compact('comeCables')); 
    }

    public function show($id)
    {
        $comeCable = Producto::findOrFail($id);
        return view('detalle-comecable', compact('comeCable'));
    }
}