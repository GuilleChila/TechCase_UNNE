<?php

use Illuminate\Support\Facades\Route;

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

route :: get('/catalogo-cargadores', function(){
      return view('catalogo-cargadores');
})->name('catalogo-cargadores');