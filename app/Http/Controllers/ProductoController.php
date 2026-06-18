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
            'nombre'       => 'required|string|max:150',        
            'modelo'       => 'required|string|max:150',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'categoria_id' => 'required|integer|exists:categoria_productos,categoria_id', 
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
            'imagen.image'          => 'El campo imagen debe ser una imagen válida.',
            'imagen.mimes'          => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, webp.',
            'categoria_id.required' => 'La categoría es obligatoria.',
        ]); 

        // 2. PROCESAMIENTO DE LA IMAGEN
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            
            // Le generamos un nombre único usando la hora actual para evitar que se pisen
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            
            // Movemos el archivo directamente a public/img/
            $imagen->move(public_path('img'), $nombreImagen);
            
            // Guardamos únicamente el nombre del archivo en la base de datos
            $datosValidados['imagen'] = $nombreImagen;
        }

        // 3. PERSISTENCIA EN LA BASE DE DATOS
        Producto::create($datosValidados);

        // 4. RESPUESTA Y REDIRECCIÓN
        return redirect()->route('productos.create')->with('success', '¡El producto ha sido guardado exitosamente!');
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
        return view('productos.modificate', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        // 1. Reglas base para todos los productos
        $reglas = [
            'nombre'       => 'required|string|max:150',
            'modelo'       => 'required|string|max:150',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'categoria_id' => 'required|integer|exists:categoria_productos,categoria_id',
            'marca'        => 'required|string|max:100',
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        // 2. Regla condicional basada en el Request de la categoría elegida
        if ($request->input('categoria_id') == 1) {
            $reglas['disenos'] = 'required|integer|min:0';
        } else {
            $reglas['disenos'] = 'nullable';
        }

        // 3. Validación exhaustiva con los mensajes personalizados en español
        $datosValidados = $request->validate($reglas, [
            'nombre.required'       => 'El nombre del producto es obligatorio.',
            'modelo.required'       => 'El modelo es obligatorio.',
            'precio.required'       => 'El precio es obligatorio.',
            'precio.numeric'        => 'El precio debe ser un número válido.',
            'stock.required'        => 'El stock es obligatorio.',
            'stock.integer'         => 'El stock debe ser un número entero.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists'   => 'La categoría seleccionada no es válida.',
            'marca.required'        => 'La marca es obligatoria.',
            'disenos.required'      => 'La cantidad de diseños es obligatoria para las Fundas.',
            'imagen.image'          => 'El archivo seleccionado debe ser una imagen válida.',
            'imagen.mimes'          => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, webp.',
            'imagen.max'            => 'La imagen no debe pesar más de 2MB.',
        ]);

        // 4. Tratamiento si se cambia de categoría (Limpieza de negocio)
        if ($datosValidados['categoria_id'] != 1) {
            $datosValidados['disenos'] = 0; // Si ya no es funda, reseteamos los diseños a 0
        }

        // 5. Reemplazo dinámico de la imagen si se cargó un archivo nuevo
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            
            // Movemos la nueva imagen a public/img/
            $imagen->move(public_path('img'), $nombreImagen);
            
            // Si el producto ya tenía una imagen vieja asignada, la borramos para no acumular basura
            if ($producto->imagen && file_exists(public_path('img/' . $producto->imagen))) {
                @unlink(public_path('img/' . $producto->imagen));
            }
            
            // Guardamos el nuevo nombre del archivo en el array a actualizar
            $datosValidados['imagen'] = $nombreImagen;
        } else {
            // Si no subió una imagen nueva, removemos el índice del array para conservar la actual
            unset($datosValidados['imagen']);
        }

        // 6. Guardamos todos los cambios usando Mass Assignment de Eloquent
        $producto->update($datosValidados);

        return redirect()->route('admin.index')->with('success', '¡El producto ha sido modificado exitosamente en el catálogo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
       $producto->delete(); // Ejecuta el SoftDelete (borrado lógico) que definiste en el modelo
        
        return redirect()->route('admin.index')->with('success', 'El producto ha sido dado de baja correctamente.');
}
public function activar($id)
    {
        // Buscamos el producto incluyendo los que están borrados lógicamente
        $producto = Producto::withTrashed()->findOrFail($id);
        
        // Lo restauramos en la base de datos
        $producto->restore();

        return redirect()->route('admin.index')->with('success', 'El producto ha sido activado correctamente.');
    }
}