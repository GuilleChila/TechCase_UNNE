<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function finalizarCompra(Request $request)
{
    // 1. Obtener el texto JSON enviado desde el formulario de JavaScript
    $productosRaw = $request->input('carrito_datos');
    $contenidoCarrito = json_decode($productosRaw, true); // Lo transformamos en array de PHP

    // Validamos que el array no haya llegado vacío
    if (empty($contenidoCarrito)) {
        return redirect()->back()->with('error', 'El carrito se encuentra vacío o no se pudieron procesar los datos.');
    }

    // Aseguramos que el usuario esté logueado, ya que 'usuario_id' no es nullable en tu migración
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para finalizar la compra.');
    }

    // Iniciamos una transacción para que impacte TODO o NADA
    DB::beginTransaction();

    try {
        // 2. Crear e impactar el registro principal en la tabla 'carritos'
        $carrito = new Carrito();
        $carrito->usuario_id = Auth::id(); // Llave foránea exacta de tu migración
        $carrito->save();

        // 3. Vincular los productos usando la relación BelongsToMany de Eloquent
        foreach ($contenidoCarrito as $item) {
            
            // Buscamos el producto en la tabla maestra 'productos' para asegurarnos de que exista
            $producto = Producto::find($item['id']);
            
            if ($producto) {
                // El método attach() inserta directamente en la tabla pivote 'carrito_producto'
                $carrito->productos()->attach($producto->id, [
                    'cantidad' => $item['cantidad']
                ]);
            }
        }

        // Si todo salió bien de manera atómica, guardamos definitivamente en la base de datos
        DB::commit();

        // 4. REDIRECCIÓN TEMPORAL: Enviamos a la página principal con el parámetro de éxito
        // Conservamos '?compra_exitosa=true' para que tu carrito.js limpie automáticamente el localStorage
        return redirect()->route('carrito.resumen')->with('compra_exitosa', '¡Tu pedido fue procesado!');
    } catch (\Exception $e) {
        // Si algo falla, cancelamos los inserts para evitar datos huérfanos o corruptos
        DB::rollBack();
        return redirect()->back()->with('error', 'Error al procesar la venta en el sistema: ' . $e->getMessage());
    }
}
public function mostrarResumen()
    {
        // 1. Validar que el usuario esté logueado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver el resumen.');
        }

        // 2. Obtener los datos del usuario autenticado de la base de datos
        $user = Auth::user();

        // 3. Pasar el usuario a la vista usando compact()
        return view('resumen-compra', compact('user'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrito $carrito)
    {
        //
    }
}
