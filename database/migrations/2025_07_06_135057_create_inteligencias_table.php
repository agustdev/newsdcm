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
        Schema::create('inteligencias', function (Blueprint $table) {
            $table->id();
            $table->string('matricula_embarcacion');
            $table->text('motivo_alerta');
            $table->enum('estado', ['Activa', 'Inactiva']);
            $table->enum('level_alert', ['Azul', 'Rojo']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inteligencias');
    }
};
