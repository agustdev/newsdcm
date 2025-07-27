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
        Schema::create('cambios_destinos_movimientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mov_id');
            $table->bigInteger('emb_id');
            $table->integer('idsalida');
            $table->integer('idllegada');
            $table->string('nuevo_destino');
            $table->enum('estado', ['Vigente', 'Inactivo'])->default('Vigente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cambios_destinos_movimientos');
    }
};
