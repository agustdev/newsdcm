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
        Schema::create('embarcacion_representante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emb_id')->references('id')->on('embarcaciones')->onDelete('cascade');
            $table->foreignId('representante_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('embarcacion_representante');
    }
};
