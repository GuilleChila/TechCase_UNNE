<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Carrito;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $usuario = auth()->user();

        // 2. Filtramos los carritos pertenecientes a este usuario (Tu lógica original intacta)
        $compras = Carrito::where('usuario_id', $usuario->id)
                          ->with('productos')
                          ->orderBy('created_at', 'desc')
                          ->get();

        // 3. Retornamos tu vista original pasándole las variables
        return view('perfil-cliente', compact('usuario', 'compras'));
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
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerfilUpdateRequest $request)
    {
        $usuario = Auth::user();

        // Mapeo explícito: Inputs del HTML -> Columnas de la Tabla en Base de Datos
        $usuario->nombre = $request->input('name');
        $usuario->correo = $request->input('email');

        // Evaluamos si el usuario ingresó una nueva contraseña
        if ($request->filled('password')) {
            // Verificamos de forma segura si la clave actual coincide
            if (!Hash::check($request->input('current_password'), $usuario->contrasenia)) {
                return back()->withErrors([
                    'current_password' => 'La contraseña actual introducida no es correcta.'
                ])->withInput();
            }

            // Encriptamos la nueva contraseña antes de guardarla
            $usuario->contrasenia = Hash::make($request->input('password'));
        }

        // Impactamos los cambios de manera permanente en la BD
        $usuario->save();

        return back()->with('success', '¡Perfil actualizado correctamente!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
