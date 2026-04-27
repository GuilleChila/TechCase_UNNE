<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catalogoComeCablesController extends controller
{
    public function index()
    {
        // Creamos el array estático de productos
        $ComeCables = [
            [
                "id" => 1,
                "descripcion" => "Come cable ",
                "precio" => 2500,
                "imagen" => "",
            ],
            [
                "id" => 2,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "",
            ],
            [
                "id" => 3,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "",
            ],
            [
                "id" => 4,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "",
            ],
            [
                "id" => 5,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "",
            ],
             [
                "id" => 6,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "",
            ]
        ];

        // Enviamos el array a la vista usando compact()
        return view('catalogo-ComeCables', compact('ComeCables'));
    }
}