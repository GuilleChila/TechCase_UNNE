<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoFundasController;
use App\Http\Controllers\catalogoCargadoresController;
use App\Http\Controllers\catalogoComeCablesController;
use App\http\Controllers\AuthController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PerfilController;

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

Route::patch('/productos/{id}/activar', [ProductoController::class, 'activar'])->name('productos.activar');

Route::get('/admin-dashboard', function () {
    return "¡Espectacular Guillermo! Lograste iniciar sesión como Administrador en TechCase.";
})->name('admin.dashboard')->middleware('admin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('products.destroy');
});
Route::post('/carrito/finalizar', [CarritoController::class, 'finalizarCompra'])->name('carrito.finalizar');

Route::get('/carrito/resumen', [CarritoController::class, 'mostrarResumen'])->name('carrito.resumen')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    
    // 1. Ruta para MOSTRAR la vista (Mantiene tu URL y tu name exacto para no romper los enlaces del sitio)
    Route::get('/mi-perfil', [PerfilController::class, 'index'])->name('cliente.perfil');

    // 2. NUEVA Ruta para PROCESAR el formulario de actualización
    Route::put('/mi-perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update');
    
});