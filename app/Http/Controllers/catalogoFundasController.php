<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catalogoFundasController extends Controller
{
        // Creamos el array estático de productos
        private $fundas = [
            [
                "id" => 1,
                "nombre" => "Funda MagSafe",
                "modelo" => "iPhone 15 Pro Max",
                /*"descripcion" => "Funda MagSafe Color: Rosa.",*/
                "precio" => 5500,
                "imagen" => "grupo-magsafe.png",
                "marca" => "Apple",
                "disenos" => 3
            ],
            [
                "id" => 2,
                "nombre" => "Funda MagSafe",
                "modelo" => "iPhone 13",
                /*"descripcion" => "Funda silicone case Colores: marron, verde oscuro, marron claro",*/
                "precio" => 6000,
                "imagen" => "grupo-magsafe.png",
                "marca" => "Apple",
                "disenos" => 5
            ],
            [
                "id" => 3,
                "nombre" => "Funda MagSafe",
                "modelo" => "iPhone 14",
                /*"descripcion" => "Funda Silicone Case Colores: azul, gris, negro",*/
                "precio" => 6000,
                "imagen" => "grupo-magsafe.png",
                "marca" => "Apple",
                "disenos" => 6
            ],
            [
                "id" => 4,
                "nombre" => "Funda MagSafe",
                "modelo" => "iPhone 14 Pro Max",
                /*"descripcion" => "Funda MagSafe Color: Violeta",*/
                "precio" => 5500,
                "imagen" => "grupo-magsafe.png",
                "marca" => "Apple",
                "disenos" => 8
            ]
        ];

        public function index(){
        return view('catalogo-fundas', ['fundas' => $this->fundas]);
        }
        
        public function show($id){
        // Buscamos dentro de $this->fundas la que coincida con el ID
        $funda = collect($this->fundas)->firstWhere('id', $id);

        if (!$funda) {
            abort(404); // Si inventan un ID en la URL, tira error 404
        }
        return view('detalle-funda', compact('funda'));
    }
        // Enviamos el array a la vista usando compact()

}