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
        Schema::table('movimientos', function (Blueprint $table) {
            $table->integer('cant_nacionales')->default(0)->nullable();
            $table->integer('cant_extranjeros')->default(0)->nullable();
            $table->integer('cant_adultos')->default(0)->nullable();
            $table->integer('cant_menores')->default(0)->nullable();
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
