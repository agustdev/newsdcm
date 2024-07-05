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
        Schema::create('pasajeros_navieras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movimiento_naviera_id');
            $table->string('family_name');
            $table->string('given_names');
            $table->string('nationality');
            $table->date('date_birth');
            $table->string('place_birth');
            $table->string('gender');
            $table->string('type_document');
            $table->string('number_document');
            $table->string('issuing_state');
            $table->date('expiry_date_document');
            $table->string('port_embarkation');
            $table->string('visa_number');
            $table->string('port_disembarkation');
            $table->string('transit_passenger');
            $table->date('date_signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasajeros_navieras');
    }
};
