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
        Schema::create('capitanes_internacionales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->comment('Nombre del capitan');
            $table->string('tipo_documento', 15)->comment('Cedula o Pasaporte');
            $table->string('documento', 15)->comment('Cedula o Pasaporte del capitan');
            $table->string('telefono', 25)->comment('Telefono del capitan');
            $table->string('nacionalidad');
            $table->string('motivo_viaje');
            $table->string('lugar_destino');
            $table->string('pais_procedencia');
            $table->string('lugar_salida');
            $table->integer('cantidad_tripulantes');
            $table->integer('cantidad_pasajeros')->nullable()->default(0);
            $table->string('tiempo_estadia')->comment('Duracion de la visita');
            $table->unsignedBigInteger('mov_inter_id');
            $table->unsignedBigInteger('dest_sa_id');
            $table->unsignedBigInteger('dest_ll_id');
            // $table->foreign('dest_sa_id')->references('id')->on('destinos')->onDelete('cascade');
            // $table->foreign('dest_ll_id')->references('id')->on('destinos')->onDelete('cascade');
            $table->foreign('mov_inter_id')->references('id')->on('movimientos_internacionales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capitanes_internacionales');
    }
};
