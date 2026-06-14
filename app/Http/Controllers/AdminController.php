<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use App\Models\Consulta; 
use App\Models\Carrito;  
use App\Models\Usuario;  
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Traemos todos los productos, INCLUYENDO los dados de baja (lógicos)
        $products = Producto::withTrashed()->latest()->get();
        
        // Mapeamos los productos para crearles la propiedad 'activo' que usa tu vista Blade
        $products->each(function($product) {
            $product->activo = !$product->trashed();
        });
    
        $consultas = Consulta::latest()->get();
        
        $ventas = Carrito::with(['usuario', 'productos'])->latest()->get();

        $usuarios = Usuario::latest()->get();

        return view('panel-admin', compact('products', 'consultas', 'ventas', 'usuarios'));
    }
}