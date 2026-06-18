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
         // 1. Reglas base obligatorias para todos los productos (Modificado max a 5MB)
         $reglas = [
             'precio'       => 'required|numeric|min:0',
             'stock'        => 'required|integer|min:0',
             'imagen'       => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', 
             'categoria_id' => 'required|integer|exists:categoria_productos,categoria_id', 
         ];

         // 2. Reglas dinámicas aplicadas según la categoría seleccionada
         if ($request->input('categoria_id') == 1) {
             // Fundas: Requiere absolutamente todo
             $reglas['nombre']  = 'required|string|max:150';
             $reglas['modelo']  = 'required|string|max:150';
             $reglas['marca']   = 'required|string|max:100';
             $reglas['disenos'] = 'required|integer|min:0';
         } elseif ($request->input('categoria_id') == 2) {
             // Cargadores: Requiere marca y nombre, pero modelo y diseños son nulos
             $reglas['nombre']  = 'required|string|max:150';
             $reglas['marca']   = 'required|string|max:100';
             $reglas['modelo']  = 'nullable';
             $reglas['disenos'] = 'nullable';
         } else {
             // ComeCables: REQUIERE NOMBRE. Modelo, marca y diseños pasan a ser nulos
             $reglas['nombre']  = 'required|string|max:150';
             $reglas['modelo']  = 'nullable';
             $reglas['marca']   = 'nullable';
             $reglas['disenos'] = 'nullable';
         }

         // 3. Validación con mensajes personalizados
         $datosValidados = $request->validate($reglas, [
             'nombre.required'       => 'El nombre del producto es obligatorio para esta categoría.',
             'modelo.required'       => 'El modelo es obligatorio para esta categoría.',
             'precio.required'       => 'El precio es obligatorio.',
             'precio.numeric'        => 'El precio debe ser un número válido.',
             'stock.required'        => 'El stock es obligatorio.',
             'stock.integer'         => 'El stock debe ser un número entero.',
             'categoria_id.exists'   => 'La categoría seleccionada no es válida.',
             'marca.required'        => 'La marca es obligatoria para esta categoría.',
             'disenos.required'      => 'La cantidad de diseños es obligatoria para las Fundas.',
             'imagen.image'          => 'El campo imagen debe ser una imagen válida.',
             'imagen.required'       => 'Es obligatorio subir una imagen para dar de alta un producto.',
             'imagen.mimes'          => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, webp.',
             'imagen.max'            => 'La imagen no debe pesar más de 5MB.', // Actualizado a 5MB
             'categoria_id.required' => 'La categoría es obligatoria.',
         ]); 

         // 4. Limpieza preventiva de datos de negocio antes de insertar en la BD
         if ($datosValidados['categoria_id'] == 2) {
             $datosValidados['modelo']  = '--';
             $datosValidados['disenos'] = 0;
         } elseif ($datosValidados['categoria_id'] == 3) {
             // Mantenemos el nombre que envió el usuario
             $datosValidados['modelo']  = '--';
             $datosValidados['marca']   = '--';
             $datosValidados['disenos'] = 0;
         }

         // 5. PROCESAMIENTO DE LA IMAGEN
         if ($request->hasFile('imagen')) {
             $imagen = $request->file('imagen');
             $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
             $imagen->move(public_path('img'), $nombreImagen);
             $datosValidados['imagen'] = $nombreImagen;
         }

         // 6. PERSISTENCIA EN LA BASE DE DATOS
         Producto::create($datosValidados);

         // 7. RESPUESTA Y REDIRECCIÓN
         return redirect()->route('admin.index')->with('success', '¡El producto ha sido guardado exitosamente!');
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
        // 1. Reglas base para todos los productos (Modificado max a 5MB)
        $reglas = [
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'categoria_id' => 'required|integer|exists:categoria_productos,categoria_id',
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ];

        // 2. Reglas condicionales basadas en la categoría seleccionada
        if ($request->input('categoria_id') == 1) {
            $reglas['nombre']  = 'required|string|max:150';
            $reglas['marca']   = 'required|string|max:100';
            $reglas['modelo']  = 'required|string|max:150';
            $reglas['disenos'] = 'required|integer|min:0';
        } elseif ($request->input('categoria_id') == 2) {
            $reglas['nombre']  = 'required|string|max:150';
            $reglas['marca']   = 'required|string|max:100';
            $reglas['modelo']  = 'nullable';
            $reglas['disenos'] = 'nullable';
        } else {
            // ComeCables: REQUIERE NOMBRE
            $reglas['nombre']  = 'required|string|max:150';
            $reglas['marca']   = 'nullable';
            $reglas['modelo']  = 'nullable';
            $reglas['disenos'] = 'nullable';
        }

        // 3. Validación exhaustiva con los mensajes personalizados en español
        $datosValidados = $request->validate($reglas, [
            'nombre.required'       => 'El nombre del producto es obligatorio.',
            'modelo.required'       => 'El modelo compatible es obligatorio para la categoría Fundas.',
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
            'imagen.max'            => 'La imagen no debe pesar más de 5MB.', // Actualizado a 5MB
        ]);

        // 4. Tratamiento e inyección de barritas si cambian las categorías
        if ($datosValidados['categoria_id'] == 2) {
            $datosValidados['modelo']  = '--';
            $datosValidados['disenos'] = 0; 
        } elseif ($datosValidados['categoria_id'] == 3) {
            // Mantenemos el nombre editado por el usuario
            $datosValidados['modelo']  = '--';
            $datosValidados['marca']   = '--';
            $datosValidados['disenos'] = 0; 
        }

        // 5. Reemplazo dinámico de la imagen si se cargó un archivo nuevo
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            
            $imagen->move(public_path('img'), $nombreImagen);
            
            if ($producto->imagen && file_exists(public_path('img/' . $producto->imagen))) {
                @unlink(public_path('img/' . $producto->imagen));
            }
            
            $datosValidados['imagen'] = $nombreImagen;
        } else {
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
       $producto->delete(); 
        
        return redirect()->route('admin.index')->with('success', 'El producto ha sido dado de baja correctamente.');
    }

    public function activar($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->restore();

        return redirect()->route('admin.index')->with('success', 'El producto ha sido activado correctamente.');
    }
}