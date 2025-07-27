<?php

namespace Database\Seeders;

use App\Models\Destinos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinos')->insert([
            ['id' => 1,  'descripcion' => 'BOCA CHICA'],
            ['id' => 3,  'descripcion' => 'SANTO DOMINGO'],
            ['id' => 4,  'descripcion' => 'ROMANA'],
            ['id' => 5,  'descripcion' => 'HAINA'],
            ['id' => 6,  'descripcion' => 'AZUA'],
            ['id' => 7,  'descripcion' => 'BARAHONA'],
            ['id' => 8,  'descripcion' => 'MANZANILLO'],
            ['id' => 9,  'descripcion' => 'PUERTO PLATA'],
            ['id' => 10, 'descripcion' => 'SAMANA'],
            ['id' => 11, 'descripcion' => 'CABO ROJO'],
            ['id' => 12, 'descripcion' => 'MULTIMODAL CAUCEDO'],
            ['id' => 13, 'descripcion' => 'PERIMTERO COSTEROS'],
        ]);

        DB::table('perimetro_costeros')->insert([
            ['salida_id' => 1, 'description' => 'CLUB NAUTICO SANTO DOMINGO'],
            ['salida_id' => 1, 'description' => 'LA MATICA'],
            ['salida_id' => 1, 'description' => 'LA PLAYITA'],
            ['salida_id' => 1, 'description' => 'MARINA DOTSIDE'],
            ['salida_id' => 1, 'description' => 'MARINA ZARPAR'],
        ]);
    }
}
