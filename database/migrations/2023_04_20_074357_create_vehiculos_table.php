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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca', 50);
            $table->string('color', 30);
            $table->integer('year');
            $table->string('placa', 30);
            $table->string('provincia', 50);
            $table->string('municipio', 50);
            $table->string('sector');
            $table->string('calle');
            $table->text('observacion');
            $table->string('provincia_salida')->comment('Provincia desde donde sale para el conduce');
            $table->string('Municipio_salida')->comment('Municipio desde donde sale para el conduce');
            $table->integer('id_provsa')->comment('Id provincia desde donde sale para el conduce');
            $table->integer('id_munsa')->comment('Id municipio desde donde sale para el conduce');
            $table->bigInteger('idcomandancia')->comment('id de la comandancia que firmara');
            $table->string('comandancia')->comment('nombre de la comandancia que firmara');
            $table->unsignedBigInteger('mov_id');
            $table->unsignedBigInteger('emb_id');
            $table->foreign('mov_id')->references('id')->on('movimientos')->onDelete('cascade');
            $table->foreign('emb_id')->references('id')->on('embarcaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
