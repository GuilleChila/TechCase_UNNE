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
                "imagen" => "comeCable1.jpeg",
            ],
            [
                "id" => 2,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "comeCable2.jpeg",
            ],
            [
                "id" => 3,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "comeCable3.jpeg",
            ],
            [
                "id" => 4,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "comeCable4.jpeg",
            ],
            [
                "id" => 5,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "comeCable5.jpeg",
            ],
             [
                "id" => 6,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "comeCable6.jpeg",
            ],
             [
                "id" => 7,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "comeCable7.jpeg",
            ],
             [
                "id" => 8,
                "descripcion" => "Come cable",
                "precio" => 2500,
                "imagen" => "comeCable8.jpeg",
            ]
        ];

        // Enviamos el array a la vista usando compact()
        return view('catalogo-ComeCables', compact('ComeCables'));
    }
}