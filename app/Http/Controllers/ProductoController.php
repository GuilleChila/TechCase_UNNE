<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'descripcion'  => 'required|string|max:150',
            'modelo'       => 'required|string|max:150',
            'precio'       => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/', // Numérico con hasta 2 decimales
            'stock'        => 'required|integer|min:0', // Solo enteros positivos
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'categoria_id' => 'required|integer|exists:categoria_productos,id', 
        ], [
            // Mensajes de error personalizados (Opcional, pero ideal para el usuario)
            'descripcion.required' => 'La descripción del producto es obligatoria.',
            'modelo.required'      => 'El modelo es obligatorio.',
            'precio.required'      => 'El precio es obligatorio.',
            'precio.numeric'       => 'El precio debe ser un número válido.',
            'stock.required'       => 'El stock es obligatorio.',
            'stock.integer'        => 'El stock debe ser un número entero.',
            'categoria_id.exists'  => 'La categoría seleccionada no es válida.',
            if ($request->hasFile('imagen')) {
        // Guarda la imagen en la carpeta 'storage/app/public/productos'
        $rutaImagen = $request->file('imagen')->store('productos', 'public');
        
        // Reemplazamos el archivo en el array por la ruta del string para guardarla en la BD
        $datosValidados['imagen'] = $rutaImagen;}
        ]);

        // PERSISTENCIA EN LA BASE DE DATOS
        Producto::create($datosValidados);

        // RESPUESTA Y REDIRECCIÓN
        return redirect()->route('productos.index')
                         ->with('success', '¡El producto ha sido guardado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        return redirect()->route('productos.index')->with('success', 'Producto eliminado (borrado lógico) correctamente.');
    }
}
