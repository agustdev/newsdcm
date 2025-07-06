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
        Schema::create('motivo_restriccions', function (Blueprint $table) {
            $table->id();
            $table->text('motivo');
            $table->enum('estado', ['Activa', 'Inactiva'])
                ->default('Activa')
                ->comment('Estado de la restricción: Activa o Inactiva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motivo_restriccions');
    }
};
