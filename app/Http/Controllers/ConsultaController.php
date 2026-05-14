<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
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
        // 1. VALIDACIÓN: Aplicamos las reglas
        $validatedData = $request->validate([
            'nombre'   => 'required|string|max:150',
            'correo'   => 'required|email',
            'telefono' => 'required|size:10',
            'motivo'   => 'required|in:ventas,soporte,envios,otros',
            'mensaje'  => 'required|max:500',
        ]);
        // 2. PERSISTENCIA: Guardamos en la base de datos usando Eloquent
        Contact::create($validatedData);

        // 3. RESPUESTA: Redireccionamos con un mensaje de éxito
        return redirect()->back()->with('success', '¡Gracias por tu consulta! Nos contactaremos pronto.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
