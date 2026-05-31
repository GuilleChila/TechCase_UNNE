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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->string('modelo', 150)->nullable();
            $table->string('marca', 100);
            $table->decimal('precio', 10, 2);
            $table->integer('stock');
            $table->integer('disenos')->nullable();
            $table->string('amperaje', 50)->nullable();
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('categoria_id')->references('categoria_id')->on('categoria_productos')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
