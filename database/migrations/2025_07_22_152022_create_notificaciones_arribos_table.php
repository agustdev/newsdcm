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
        Schema::create('notificaciones_arribos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mov_id')->unsigned();
            $table->bigInteger('emb_id')->unsigned();
            $table->enum('tipo_notificacion', ['Arribo', 'Zarpe']);
            $table->enum('estatus_notificacion', ['Si', 'No']);
            $table->string('mensaje')->nullable();
            $table->foreign('mov_id')->references('id')->on('movimientos')->onDelete('cascade');
            $table->foreign('emb_id')->references('id')->on('embarcaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones_arribos');
    }
};
