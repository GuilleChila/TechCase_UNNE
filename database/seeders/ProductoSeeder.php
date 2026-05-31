<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categoria_productos')->truncate();
        DB::table('productos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Insertamos las categorías obligatorias en la BD para que existan los IDs correspondientes
        DB::table('categoria_productos')->insert([
            ['categoria_id' => 1, 'nombreCategoria' => 'Fundas', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 2, 'nombreCategoria' => 'Cargadores', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 3, 'nombreCategoria' => 'Comecables', 'created_at' => now(), 'updated_at' => now()],
        ]);
        // 1. FUNDAS (categoria_id => 1)
        $fundas = [
            ["nombre" => "Funda MagSafe", "modelo" => "iPhone 11", "precio" => 5500, "imagen" => "grupo-magsafe.png", "marca" => "Apple", "disenos" => 7, "stock" => 10, "categoria_id" => 1],
            ["nombre" => "Funda MagSafe", "modelo" => "iPhone 13", "precio" => 5500, "imagen" => "grupo-magsafe.png", "marca" => "Apple", "disenos" => 7, "stock" => 10, "categoria_id" => 1],
            ["nombre" => "Funda MagSafe", "modelo" => "iPhone 14 pro", "precio" => 5500, "imagen" => "grupo-magsafe.png", "marca" => "Apple", "disenos" => 7, "stock" => 10, "categoria_id" => 1],
            ["nombre" => "Funda MagSafe", "modelo" => "iPhone 15 Pro ", "precio" => 5500, "imagen" => "grupo-magsafe.png", "marca" => "Apple", "disenos" => 7, "stock" => 10, "categoria_id" => 1],
            ["nombre" => "Funda MagSafe", "modelo" => "iPhone 16", "precio" => 5500, "imagen" => "grupo-magsafe.png", "marca" => "Apple", "disenos" => 7, "stock" => 10, "categoria_id" => 1],
            ["nombre" => "Funda MagSafe", "modelo" => "iPhone 17 Pro", "precio" => 5500, "imagen" => "grupo-magsafe.png", "marca" => "Apple", "disenos" => 7, "stock" => 10, "categoria_id" => 1],
            ["nombre" => "Funda Silicone Case", "modelo" => "iPhone 11", "precio" => 6000, "imagen" => "grupo-siliconeCase.png", "marca" => "Apple", "disenos" => 13, "stock" => 15, "categoria_id" => 1],
            ["nombre" => "Funda Silicone Case", "modelo" => "iPhone 13", "precio" => 6000, "imagen" => "grupo-siliconeCase.png", "marca" => "Apple", "disenos" => 13, "stock" => 15, "categoria_id" => 1],
            ["nombre" => "Funda Silicone Case", "modelo" => "iPhone 14 Pro ", "precio" => 6000, "imagen" => "grupo-siliconeCase.png", "marca" => "Apple", "disenos" => 13, "stock" => 15, "categoria_id" => 1],
            ["nombre" => "Funda Silicone Case", "modelo" => "iPhone 15 Pro ", "precio" => 6000, "imagen" => "grupo-siliconeCase.png", "marca" => "Apple", "disenos" => 13, "stock" => 15, "categoria_id" => 1],
            ["nombre" => "Funda Silicone Case", "modelo" => "iPhone 16", "precio" => 6000, "imagen" => "grupo-siliconeCase.png", "marca" => "Apple", "disenos" => 13, "stock" => 15, "categoria_id" => 1],
            ["nombre" => "Funda Silicone Case", "modelo" => "iPhone 17 Pro ", "precio" => 6000, "imagen" => "grupo-siliconeCase.png", "marca" => "Apple", "disenos" => 13, "stock" => 15, "categoria_id" => 1]
        ];

        // 2. CARGADORES (categoria_id => 2)
        $cargadores = [
            ["nombre" => "Cargador USB-C 20w", "precio" => 11000, "imagen" => "cargador-20w.png", "marca" => "Apple", "amperaje" => "20w", "stock" => 20, "categoria_id" => 2],
            ["nombre" => "Cargador USB ", "precio" => 7000, "imagen" => "cargador-5w.png", "marca" => "Apple", "amperaje" => "5w", "stock" => 20, "categoria_id" => 2],
            ["nombre" => "Cable USB-C a Lightning", "precio" => 4900, "imagen" => "cable.C-lightning.png", "marca" => "Apple", "stock" => 30, "categoria_id" => 2],
            ["nombre" => "Cable USB a Lightning", "precio" => 3900, "imagen" => "cable-comun.png", "marca" => "Apple", "stock" => 30, "categoria_id" => 2],
            ["nombre" => "Cable USB a USB-C", "precio" => 3500, "imagen" => "cable.usb-c-usb.png", "marca" => "Apple", "stock" => 30, "categoria_id" => 2],
            ["nombre" => "Cable USB-c a USB-C", "precio" => 4900, "imagen" => "cable.usb-c.usb-c.png", "marca" => "Apple", "stock" => 30, "categoria_id" => 2]
        ];

        // 3. COMECABLES (categoria_id => 3)
        $comeCables = [
            ["nombre" => "Come cable 1", "precio" => 2500, "imagen" => "comeCable1.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3],
            ["nombre" => "Come cable 2", "precio" => 2500, "imagen" => "comeCable2.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3],
            ["nombre" => "Come cable 3", "precio" => 2500, "imagen" => "comeCable3.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3],
            ["nombre" => "Come cable 4", "precio" => 2500, "imagen" => "comeCable4.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3],
            ["nombre" => "Come cable 5", "precio" => 2500, "imagen" => "comeCable5.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3],
            ["nombre" => "Come cable 6", "precio" => 2500, "imagen" => "comeCable6.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3],
            ["nombre" => "Come cable 7", "precio" => 2500, "imagen" => "comeCable7.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3],
            ["nombre" => "Come cable 8", "precio" => 2500, "imagen" => "comeCable8.jpeg", "marca" => "Genérica", "stock" => 50, "categoria_id" => 3]
        ];

        // Insertar todo en la base de datos
        foreach (array_merge($fundas, $cargadores, $comeCables) as $item) {
            Producto::create($item);
        }
    }
}