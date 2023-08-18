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
            $table->date('fecha')->comment('Fecha de salida');
            $table->enum('tipo_movimiento', ['D', 'C', 'E', 'S'])->comment('D => Despacho, C => Conduce, E => Entrada, S => Salida');
            $table->string('nombre')->comment('Nombre de la embarcación');
            $table->string('matricula')->comment('Matricula de la embarcación');
            $table->string('numero_casco')->comment('Numero de casco de la embarcación');
            $table->string('color')->comment('Color de la embarcación');
            $table->string('estado')->comment('Estado de la solicitud');
            $table->string('estado_alerta')->comment('Estado de la alerta');
            $table->unsignedBigInteger('emb_id');
            $table->unsignedBigInteger('user_id');
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
