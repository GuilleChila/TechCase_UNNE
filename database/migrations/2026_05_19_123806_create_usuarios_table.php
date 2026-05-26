<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->string('documento', 8);
            $table->string('correo', 250)->unique();
            $table->string('contrasenia');
            $table->boolean('estado', 1);
            $table->unsignedInteger('perfil_id');
            $table->foreign('perfil_id')->references('perfil_id')->on('perfils');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
