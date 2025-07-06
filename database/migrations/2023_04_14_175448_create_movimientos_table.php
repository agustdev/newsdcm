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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha')->comment('Fecha de salida');
            $table->dateTime('fecha_llegada')->comment('Fecha de llegada de la embarcación');
            $table->enum('tipo_movimiento', ['D', 'C'])->comment('D => Despacho, C => Conduce');
            $table->string('nombre')->comment('Nombre de la embarcación');
            $table->string('matricula')->comment('Matricula de la embarcación');
            $table->string('numero_casco')->comment('Numero de casco de la embarcación');
            $table->string('marca_modelo_motor')->length(100)->comment('Marca del motor de la embarcacion');
            $table->string('caballos_fuerza_motor')->length(10)->comment('Cantidad caballos de fuerza del motor de la embarcacion');
            $table->string('no_motor')->length(100)->comment('Numero del motor');
            $table->string('color')->comment('Color de la embarcación');
            $table->string('estado')->comment('Estado de la solicitud');
            $table->string('estado_alerta')->comment('Estado de la alerta');
            $table->unsignedBigInteger('emb_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('idsalida');
            $table->integer('idllegada');
            $table->string('detalle_destino')->nullable();
            $table->string('vcode', 10);
            $table->uuid('url_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('emb_id')->references('id')->on('embarcaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
