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
        Schema::create('capitanes_registrados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->comment('Nombre del capitan');
            $table->string('tipo_documento', 15)->comment('Cedula o Pasaporte');
            $table->string('documento', 15)->comment('Cedula o Pasaporte del capitan');
            $table->string('telefono', 25)->comment('Telefono del capitan');
            $table->string('nacionalidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capitanes_registrados');
    }
};
