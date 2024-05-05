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
        Schema::create('embarcaciones', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 100)->comment('Matricula de la embarcacion');
            $table->string('matricula_anexa', 100)->comment('Segunda matricula de la embarcacion');
            $table->string('nombre', 150)->comment('Nombre de la embarcacion');
            $table->string('no_chasis', 150)->comment('Numero de chasis de la embarcacion');
            $table->string('color', 150)->comment('Color de la embarcacion');
            $table->integer('capacidad_personas')->length(50)->comment('Cantidad de personas que soporta la embarcacion');
            $table->integer('capacidad_tripulantes')->length(50)->comment('Cantidad de tripulantes que soporta la embarcacion');
            $table->string('marca_modelo_motor')->length(100)->comment('Marca del motor de la embarcacion');
            $table->string('caballos_fuerza_motor')->length(10)->comment('Cantidad caballos de fuerza del motor de la embarcacion');
            $table->string('no_motor')->length(100)->comment('Numero del motor');
            $table->enum('estatus', ['A', 'I'])->comment('Estado de la matricula de la embarcacion');
            $table->integer('pies_eslora')->length(40)->default(0);
            $table->integer('pulg_eslora')->length(40)->default(0);
            $table->integer('pies_manga')->length(40)->default(0);
            $table->integer('pulg_manga')->length(40)->default(0);
            $table->integer('pies_puntual')->length(40)->default(0);
            $table->integer('pulg_puntual')->length(40)->default(0);
            $table->integer('tonelada_bruta')->length(40)->default(0);
            $table->integer('tonelada_neta')->length(40)->default(0);
            $table->string('tipo_embarcacion', 50);
            $table->string('tipo_uso', 50);
            $table->string('desc_estatus', 50)->nullable();
            $table->string('estacionamiento', 100)->nullable();
            $table->string('tipo_propietario', 5);
            $table->string('nombre_propietario', 150)->comment('Nombre del propietario de la embarcacion');
            $table->string('representado_por', 150)->comment('Representante de la embarcacion');
            $table->string('no_documento', 40)->comment('Numero de documento del propietario de la embarcación');
            $table->string('dir_propietario')->comment('Direccion del propietario de la embarcacion');
            $table->date('fecha_validez')->comment('Fecha de validez de la matricula de la embarcacion');
            $table->integer('impedimento')->length(5)->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('embarcaciones');
    }
};
