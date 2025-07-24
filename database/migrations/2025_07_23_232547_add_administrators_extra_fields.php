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
        Schema::table('administrators', function (Blueprint $table) {
            $table->integer('cap_id')->default(0)->comment('ID de la comandancia perteneciente del usuario en caso de ser 0 es el comando naval de capitanias');
            $table->integer('level')->default(0)->comment('level 0 es superusuario o usuario comando naval de capitanias, 1 directores y 2 operadores');
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
