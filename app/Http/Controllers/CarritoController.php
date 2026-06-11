<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto; 

use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function finalizarCompra(Request $request)
    {
        // Convertimos el JSON que envía JavaScript a un array de PHP
        $carritoItems = json_decode($request->input('carrito_datos'), true);

        if (empty($carritoItems)) {
            return redirect()->back()->with('error', 'El carrito está vacío o no se pudo procesar.');
        }

        // Iniciamos una transacción de Base de Datos para asegurar la consistencia del Stock
        DB::beginTransaction();

        try {
            // ==========================================
            // 2. PRIMERA PASADA: Validar que HAYA stock real de todo
            // ==========================================
            foreach ($carritoItems as $item) {
                
                // Buscamos el registro en tu única tabla de productos usando su ID y bloqueamos la fila
                $producto = Producto::lockForUpdate()->find($item['id']);

                if (!$producto) {
                    throw new \Exception("El producto '{$item['nombre']}' ya no está disponible en nuestro catálogo.");
                }

                // Validación de cantidades solicitadas vs base de datos
                if ($producto->stock < $item['cantidad']) {
                    throw new \Exception("Lo sentimos, el stock de '{$item['nombre']}' cambió hace instantes. Solo quedan {$producto->stock} unidades disponibles.");
                }
            }

            // ==========================================
            // 3. SEGUNDA PASADA: Si todo está OK, DESCONTAMOS el stock
            // ==========================================
            foreach ($carritoItems as $item) {
                
                // Buscamos el producto en el modelo único
                $producto = Producto::find($item['id']);
                
                // Reducimos las existencias de forma segura
                $producto->decrement('stock', $item['cantidad']);
            }

            // Confirmamos de forma definitiva la persistencia en la base de datos
            DB::commit();

            // Redirigimos al Home con la señal de éxito
            return redirect()->route('principal')->with('compra_exitosa', '¡Tu compra en TechCase se realizó con éxito!');

        } catch (\Exception $e) {
            // Si algo falla, cancelamos cualquier descuento parcial ejecutado
            DB::rollBack();

            // Regresamos al carrito informando el error exacto
            return redirect()->back()->with('error', $e->getMessage());
        }
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
