<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        return back()->with('success', '¡Formato correcto!');
    }
    public function register(RegistroRequest $request){
        return redirect()->route('login')->with('success', '¡Cuenta creada con éxito!');
    }
}

