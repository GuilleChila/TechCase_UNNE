<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catalogoCargadoresController extends controller
{
    public function index()
    {
        // Creamos el array estático de productos
        $Cargadores = [
            [
                "id" => 1,
                "amperaje" => "20w",
                "descripcion" => "Cargador USB-C 20w",
                "precio" => 11000,
                "imagen" => "cargador-20w.png",
                "marca" => "Apple"
            ],
            [
                "id" => 2,
                "amperaje" => "5w",
                "descripcion" => "Cargador USB ",
                "precio" => 7000,
                "imagen" => "cargador-5w.png",
                "marca" => "Apple"
            ],
            [
                "id" => 3,
                "descripcion" => "Cable USB-C a Lightning",
                "precio" => 4900,
                "imagen" => "cable.C-lightning.png",
                "marca" => "Apple"
            ],
            [
                "id" => 4,
                "descripcion" => "Cable USB a Lightning",
                "precio" => 3900,
                "imagen" => "cable-comun.png",
                "marca" => "Apple"
            ],
            [
                "id" => 5,
                "descripcion" => "Cable USB a USB-C",
                "precio" => 3500,
                "imagen" => "cable.usb-c-usb.png",
                "marca" => "Apple"
            ],
             [
                "id" => 6,
                "descripcion" => "Cable USB-c a USB-C",
                "precio" => 4900,
                "imagen" => "cable.usb-c.usb-c.png",
                "marca" => "Apple"
            ]
        ];

        // Enviamos el array a la vista usando compact()
        return view('/catalogo-cargadores', compact('Cargadores'));
    }
}