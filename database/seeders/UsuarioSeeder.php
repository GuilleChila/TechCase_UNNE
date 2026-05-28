<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['correo' => 'guillerausch614@gmail.com'], // Si ya existe, lo busca; si no, lo crea
            [
                'nombre' => 'Guillermo Chilvaert Rauschmair',
                'documento' => '46830614', // Tu DNI o uno de prueba
                'contrasenia' => Hash::make('Guillermo614'), // Tu contraseña encriptada
                'estado' => 1,
                'perfil_id' => 2 // 2 = Administrador según tu PerfilSeeder
            ]
        );
    }
}
