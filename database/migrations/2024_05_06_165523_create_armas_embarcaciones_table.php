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
        Schema::create('armas_embarcaciones', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->text('tipo_armas')->nullable();
            $table->unsignedBigInteger('mov_inter_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armas_embarcaciones');
    }
};
