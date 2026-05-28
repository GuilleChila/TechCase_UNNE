<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoFundasController;
use App\Http\Controllers\catalogoCargadoresController;
use App\Http\Controllers\catalogoComeCablesController;
use App\http\Controllers\AuthController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});
Route:: get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
})->name('sobre-nosotros');
/*generar un redireccionamiento al controlador*/
/*Route::get('inicio', [PruebaController::class, 'index']);*/
Route::get('/principal', function (){
    return view('principal');
})->name('principal');

Route::get('/contacto', function (){
    return view('contacto');
})->name('contacto');

Route::post('/login', function () {
    return "Login OK";
})->name('login');

Route::post('/register', function () {
    return "Registro OK";
})->name('register');

Route::get('/preguntas-frecuentes', function(){
    return view('preguntas-frecuentes');
})->name('preguntas frecuentes');

Route::get('/catalogo', function(){
    return view('catalogo');
})->name('catalogo');

Route::get('/terminos-condiciones', function(){
    return view('terminos-condiciones');
})->name('terminos-condiciones');

Route::get('/carrito', function(){
    return view('carrito');
})->name('carrito');

Route::get('/catalogo-fundas', [catalogoFundasController::class, 'index'])->name('catalogo-fundas');

Route::get('/producto/{id}', [CatalogoFundasController::class, 'show'])->name('detalle-funda');

Route::get('/catalogo-cargadores', [catalogoCargadoresController::class, 'index'])->name('catalogo-cargadores');

Route::get('/catalogo-ComeCables', [catalogoComeCablesController::class, 'index'])->name('catalogo-ComeCables');

Route::post('/login-check', [AuthController::class, 'login'])->name('login.post');

Route::post('/registro', [AuthController::class, 'register'])->name('register.post');

Route::post('/contacto', [ConsultaController::class, 'store'])->name('contacto.post');

Route::resource('productos', ProductoController::class);

Route::get('/admin-dashboard', function () {
    return "¡Espectacular Guillermo! Lograste iniciar sesión como Administrador en TechCase.";
})->name('admin.dashboard');