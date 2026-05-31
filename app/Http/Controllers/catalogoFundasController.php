<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class catalogoFundasController extends Controller
{
    /**
     * Muestra el listado de fundas directamente desde la base de datos.
     */
    public function index()
    {
        // Traemos solo los productos cuyo categoria_id sea 1 (Fundas)
        $fundas = Producto::where('categoria_id', 1)->get();

        // Enviamos la colección a la vista catalogo-fundas
        return view('catalogo-fundas', compact('fundas'));
    }

    /**
     * Muestra el detalle de una funda específica por su ID.
     */
    public function show($id)
    {
        // Buscamos el producto en la base de datos por su ID.
        // Si no lo encuentra, 'findOrFail' lanza automáticamente el error 404.
        $funda = Producto::findOrFail($id);

        return view('detalle-funda', compact('funda'));
    }
}