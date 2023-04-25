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
        Schema::create('conductores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('documento');
            $table->string('telefono');
            $table->unsignedBigInteger('mov_id');
            $table->unsignedBigInteger('emb_id');
            $table->unsignedBigInteger('veh_id');
            $table->foreign('mov_id')->references('id')->on('movimientos')->onDelete('cascade');
            $table->foreign('emb_id')->references('id')->on('embarcaciones')->onDelete('cascade');
            $table->foreign('veh_id')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
