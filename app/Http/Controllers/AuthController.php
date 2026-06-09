<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $datosValidados = $request->validated();

        $credenciales = [
            'correo'   => $datosValidados['email'],
            'password' => $datosValidados['password'], // Auth::attempt intercepta 'password' automáticamente para verificar contra el Hash
        ];

        if (Auth::attempt($credenciales)) {
        
        // Regenerar la sesión por seguridad (evita fijación de sesiones)
        $request->session()->regenerate();

        // Obtenemos el objeto del usuario que acaba de loguearse
        $usuarioLogueado = Auth::user();

        // 4. Redirección inteligente según PerfilSeeder:
        if ($usuarioLogueado->perfil_id == 2) { 
            return redirect()->route('admin.index')->with('success', '¡Bienvenido al Panel de Administración!');
        }
        return redirect()->route('principal')->with('success', '¡Sesión iniciada con éxito! Disfrutá de TechCase.');

    // 5. Si las credenciales fallan, volvemos atrás inyectando el error en el modal
    return back()->withErrors([
        'email' => 'El correo electrónico o la contraseña son incorrectos.',
    ])->onlyInput('email');

    }
    public function register(RegistroRequest $request){
        $datosValidados = $request->validated();

        Usuario::create([
            'nombre' => $datosValidados['name'],
            'documento' => $datosValidados['documento'],
            'correo' => $datosValidados['email'],
            // Encriptamos la contraseña con Hash (vital para la autenticación)
            'contrasenia' => Hash::make($datosValidados['password']), 
            'perfil_id' => 1, // Tu ID por defecto para clientes regulares
        ]);
       return back()->with('success', '¡Cuenta creada con éxito! Ya podés iniciar sesión.');
    }

    public function logout(Request $request)
{
    // 1. Desloguea al usuario en el sistema
    Auth::logout();

    // 2. Invalida la sesión del navegador para que no se pueda reutilizar
    $request->session()->invalidate();

    // 3. Regenera el token CSRF por seguridad
    $request->session()->regenerateToken();

    // 4. Redirige a la página principal con un mensaje de éxito
    return redirect('/principal')->with('success', 'Sesión cerrada correctamente.');
}
}

