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
        Schema::create('busy_movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mov_id');
            $table->unsignedBigInteger('user_id')->comment('indicado si el usuario/propietario esta editando la solicitud');
            $table->unsignedBigInteger('admin_id')->comment('indicador si el usuario admin esta revisando la solicitud para toma de desición');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('busy_movimientos');
    }
};
