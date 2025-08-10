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
            ['id' => 13, 'descripcion' => 'PERIMETRO COSTEROS'],
        ]);

        DB::table('perimetro_costeros')->insert([
            ['salida_id' => 1, 'description' => 'CLUB NAUTICO SANTO DOMINGO'],
            ['salida_id' => 1, 'description' => 'LA MATICA'],
            ['salida_id' => 1, 'description' => 'LA PLAYITA'],
            ['salida_id' => 1, 'description' => 'MARINA DOTSIDE'],
            ['salida_id' => 1, 'description' => 'MARINA ZARPAR'],
            ['salida_id' => 4, 'description' => 'ISLA SAONA'],
            ['salida_id' => 4, 'description' => 'ISLA CATALINA.'],
            ['salida_id' => 4, 'description' => 'LA ROMANA: RIO SALADO'],
            ['salida_id' => 4, 'description' => 'CUMAYASA.'],
            ['salida_id' => 4, 'description' => 'SAN PEDRO.'],
            ['salida_id' => 4, 'description' => 'JUANILLO: CAP CANA.'],
            ['salida_id' => 4, 'description' => 'CASA DE CAMPO RIO CHAVON'],
            ['salida_id' => 4, 'description' => 'RIO CHAVO'],
            ['salida_id' => 4, 'description' => 'CATUANO'],
            ['salida_id' => 4, 'description' => 'MANO JUAN'],
            ['salida_id' => 5, 'description' => 'BANI SALINAS'],
            ['salida_id' => 5, 'description' => 'PLAYA DEL 13 (MANRESSA)'],
            ['salida_id' => 5, 'description' => 'SANTO DOMINGO'],
            ['salida_id' => 5, 'description' => 'BOCA CHICA'],
        ]);
    }
}
