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
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('carrito_producto', function (Blueprint $table) {
            $table->id(); // Primary Key de la tabla intermedia

            // Clave foránea que apunta al carrito creado arriba
            $table->unsignedBigInteger('carrito_id');
            $table->foreign('carrito_id')
                  ->references('id')
                  ->on('carritos')
                  ->onDelete('cascade'); // Si se elimina el carrito, se limpian sus registros aquí

            // Clave foránea que apunta a tu tabla 'productos'
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade'); // Si un producto se elimina del sistema, se quita de los carritos

            // Atributo adicional para controlar las unidades de cada accesorio
            $table->integer('cantidad')->default(1);

            $table->timestamps();

            // Restricción única para asegurar que un producto no se duplique en filas distintas del mismo carrito
            $table->unique(['carrito_id', 'producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_producto');
        Schema::dropIfExists('carritos');
    }
};
