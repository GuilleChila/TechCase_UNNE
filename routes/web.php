<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route:: get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});
/*generar un redireccionamiento al controlador*/
/*Route::get('inicio', [PruebaController::class, 'index']);*/
Route::get('/principal', function (){
    return view('principal');
});
