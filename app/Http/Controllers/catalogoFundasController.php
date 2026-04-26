<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catalogoFundasController extends Controller
{
    public function index()
    {
        // Creamos el array estático de productos
        $fundas = [
            [
                "id" => 1,
                "modelo" => "iPhone 15 Pro Max",
                "descripcion" => "Funda MagSafe Color: Rosa.",
                "precio" => 5500,
                "imagen" => "tarjeta_funda.jpg",
                "marca" => "Apple"
            ],
            [
                "id" => 2,
                "modelo" => "iPhone 13",
                "descripcion" => "Funda silicone case Colores: marron, verde oscuro, marron claro",
                "precio" => 6000,
                "imagen" => "funda_silicona_13.jpeg",
                "marca" => "Apple"
            ],
            [
                "id" => 3,
                "modelo" => "iPhone 14",
                "descripcion" => "Funda Silicone Case Colores: azul, gris, negro",
                "precio" => 6000,
                "imagen" => "funda_silicona_14.jpeg",
                "marca" => "Apple"
            ],
            [
                "id" => 4,
                "modelo" => "iPhone 14 Pro Max",
                "descripcion" => "Funda MagSafe Color: Violeta",
                "precio" => 5500,
                "imagen" => "funda_magsafe_14promax.jpeg",
                "marca" => "Apple"
            ]
        ];

        // Enviamos el array a la vista usando compact()
        return view('catalogo-fundas', compact('fundas'));
    }
}