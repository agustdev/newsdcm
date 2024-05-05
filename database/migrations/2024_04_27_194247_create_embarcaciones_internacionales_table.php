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
        Schema::create('embarcaciones_internacionales', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 100)->comment('Matricula de la embarcacion');
            $table->string('nombre', 150)->comment('Nombre de la embarcacion');
            $table->string('no_chasis', 150)->comment('Numero de chasis de la embarcacion');
            $table->string('color', 150)->comment('Color de la embarcacion');
            $table->string('material_casco', 150)->comment('Material del casco de la embarcacion');
            $table->integer('capacidad_personas')->length(50)->comment('Cantidad de personas que soporta la embarcacion');
            $table->integer('capacidad_tripulantes')->length(50)->comment('Cantidad de tripulantes que soporta la embarcacion');
            $table->string('tipo_motor')->length(100)->comment('Tipo del motor de la embarcacion');
            $table->string('marca_modelo_motor')->length(100)->comment('Marca del motor de la embarcacion');
            $table->string('caballos_fuerza_motor')->length(10)->comment('Cantidad caballos de fuerza del motor de la embarcacion');
            $table->string('no_motor')->length(100)->comment('Numero del motor');
            $table->decimal('eslora')->length(40)->default(0);
            $table->decimal('manga')->length(40)->default(0);
            $table->decimal('puntal')->length(40)->default(0);
            $table->string('tipo_embarcacion', 50);
            $table->string('tipo_uso', 50);
            $table->string('no_documento', 40)->comment('Numero de documento del propietario de la embarcación');
            $table->string('nombre_propietario', 150)->comment('Nombre del propietario de la embarcacion');
            $table->string('puerto_registro', 100)->nullable();
            $table->string('pais_procedencia', 100)->nullable();
            $table->date('fecha_validez')->comment('Fecha de validez de la matricula de la embarcacion');
            $table->enum('estatus', ['A', 'I'])->default('A')->comment('Estado de la matricula de la embarcacion');
            $table->integer('impedimento')->length(5)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('embarcaciones_internacionales');
    }
};
