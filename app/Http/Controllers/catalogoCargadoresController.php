<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class catalogoCargadoresController extends Controller
{
    public function index()
    {
        // Trae los productos de la BD de la categoría Cargadores (2)
        $Cargadores = Producto::where('categoria_id', 2)->get();

        return view('catalogo-cargadores', compact('Cargadores'));
    }

    public function show($id)
    {
        $cargador = Producto::findOrFail($id);
        return view('detalle-cargador', compact('cargador'));
    }
}