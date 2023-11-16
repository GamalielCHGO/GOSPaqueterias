<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->string('guia');
            
            $table->string('nombre_remitente');
            $table->string('direccion_remitente');
            $table->string('telefono_remitente');
            $table->string('correo');
            $table->string('rfc');

            $table->string('nombre_destino');
            $table->string('correo_destino');
            $table->string('direccion_destino');
            $table->string('telefono_destino');

            $table->string('estado')->default('R');

            $table->timestamp('fecha_recibo')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_envio')->nullable();
            $table->timestamp('fecha_sucursal')->nullable();
            $table->timestamp('fecha_entrega')->nullable();

            $table->string('sucursal_origen')->nullable();
            $table->string('sucursal_destino')->nullable();
            $table->string('contrasena_entrega');

            $table->integer('total')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('transporte')->nullable();

            $table->string('ine')->nullable();
            $table->string('firma')->nullable();
            $table->string('pdf')->nullable();

            $table->string('id_transporte')->nullable();
            $table->string('evidencia_recibo')->nullable();
            $table->string('observaciones_recibo')->nullable();
            $table->string('ocurre')->nullable();
            $table->string('etiqueta')->nullable();

            $table->string('ine_entrega')->nullable();
            $table->string('firma_entrega')->nullable();
            
            

            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};


