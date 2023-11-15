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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('envioId');
            $table->string('tipo');
            $table->integer('cantidad');
            $table->integer('alto');
            $table->integer('largo');
            $table->integer('ancho');
            $table->integer('costo');
            $table->integer('peso');
            $table->string('evidencia');
            $table->string('contenido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
