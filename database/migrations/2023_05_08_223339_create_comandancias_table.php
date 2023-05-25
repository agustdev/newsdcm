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
        Schema::create('comandancias', function (Blueprint $table) {
            $table->id();
            $table->integer('idcomandancia');
            $table->integer('idprovincia')->comment('Id de la provincia a la que pertenece la comandancia');
            $table->string('descripcion')->comment('Nombre de la comandancia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comandancias');
    }
};
