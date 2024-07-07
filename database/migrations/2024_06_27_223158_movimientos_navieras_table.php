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
        Schema::create('movimientos_navieras', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_movimiento', ['NE', 'NS']);
            $table->string('name_ship');
            $table->string('number_imo');
            $table->string('call_sign');
            $table->string('number_voyage');
            $table->string('port_salida_llegada');
            $table->datetime('datetime_salida_llegada');
            $table->string('flag_state');
            $table->string('name_master');
            $table->string('last_port_call');
            $table->string('certificate_registry');
            $table->text('name_contact_ship');
            $table->string('gross_tonnage');
            $table->string('net_tonnage');
            $table->text('brief_particulars');
            $table->text('brief_description');
            $table->string('number_crew');
            $table->string('number_passengers');
            $table->text('remarks');
            $table->string('cargo_declaration');
            $table->string('ship_stores_declaration');
            $table->string('crew_list');
            $table->string('passenger_list');
            $table->string('crew_effects_declaration');
            $table->text('the_ship_requiriments');
            $table->string('maritime_declaration_health');
            $table->string('date_signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
