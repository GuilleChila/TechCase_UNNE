<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Perfilseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perfil::updateOrCreate(
            ['perfil_id' => 1], 
            ['nombre_perfil' => 'Cliente']
        );

        Perfil::updateOrCreate(
            ['perfil_id' => 2], 
            ['nombre_perfil' => 'Administrador']
        );
    }
}
