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
     // 1. VALIDACIÓN (Actualizada con nombre, marca y disenos)
        $datosValidados = $request->validate([
            'nombre'       => 'required|string|max:150',            'modelo'       => 'required|string|max:150',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'categoria_id' => 'required|integer|exists:categoria_productos,id', 
            'marca'        => 'required|string|max:100',
            'disenos'      => 'required|integer|min:0',  
        ], [
            // Mensajes de error personalizados
            'nombre.required'       => 'El nombre del producto es obligatorio.',
            'modelo.required'       => 'El modelo es obligatorio.',
            'precio.required'       => 'El precio es obligatorio.',
            'precio.numeric'        => 'El precio debe ser un número válido.',
            'stock.required'        => 'El stock es obligatorio.',
            'stock.integer'         => 'El stock debe ser un número entero.',
            'categoria_id.exists'   => 'La categoría seleccionada no es válida.',
            'marca.required'        => 'La marca es obligatoria.',
            'disenos.required'      => 'La cantidad de diseños es obligatoria.',
        ]); 

        // 2. PROCESAMIENTO DE LA IMAGEN (Fuera de la validación, donde corresponde)
        if ($request->hasFile('imagen')) {
            // Guarda la imagen en 'storage/app/public/productos'
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            
            // Reemplazamos el archivo en el array por la ruta en formato String
            $datosValidados['imagen'] = $rutaImagen;
        }

        // 3. PERSISTENCIA EN LA BASE DE DATOS
        Producto::create($datosValidados);

        // 4. RESPUESTA Y REDIRECCIÓN
        return redirect()->route('productos.index')->with('success', '¡El producto ha sido guardado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
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
       $producto->delete(); // Ejecuta el SoftDelete (borrado lógico) que definiste en el modelo
        
        return redirect()->route('productos.index')->with('success', 'Producto eliminado (borrado lógico) correctamente.');
    }
}
