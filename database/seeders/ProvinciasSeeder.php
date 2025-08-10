<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $provincias = [
            ['id' => 1,  'descripcion' => 'DISTRITO NACIONAL'],
            ['id' => 2,  'descripcion' => 'LA ALTAGRACIA'],
            ['id' => 3,  'descripcion' => 'AZUA'],
            ['id' => 4,  'descripcion' => 'BAHORUCO'],
            ['id' => 5,  'descripcion' => 'BARAHONA'],
            ['id' => 6,  'descripcion' => 'DAJABON'],
            ['id' => 7,  'descripcion' => 'DUARTE'],
            ['id' => 8,  'descripcion' => 'EL SEIBO'],
            ['id' => 9,  'descripcion' => 'ELIAS PIÑA'],
            ['id' => 10, 'descripcion' => 'ESPAILLAT'],
            ['id' => 11, 'descripcion' => 'HATO MAYOR'],
            ['id' => 12, 'descripcion' => 'INDEPENDENCIA'],
            ['id' => 13, 'descripcion' => 'LA ROMANA'],
            ['id' => 14, 'descripcion' => 'LA VEGA'],
            ['id' => 15, 'descripcion' => 'MARIA TRINIDAD SANCHEZ'],
            ['id' => 16, 'descripcion' => 'MONSEÑOR NOUEL'],
            ['id' => 17, 'descripcion' => 'MONTE CRISTI'],
            ['id' => 18, 'descripcion' => 'MONTE PLATA'],
            ['id' => 19, 'descripcion' => 'PEDERNALES'],
            ['id' => 20, 'descripcion' => 'PERAVIA'],
            ['id' => 21, 'descripcion' => 'PUERTO PLATA'],
            ['id' => 22, 'descripcion' => 'HERMANAS MIRABAL'],
            ['id' => 23, 'descripcion' => 'SAMANA'],
            ['id' => 24, 'descripcion' => 'SAN CRISTOBAL'],
            ['id' => 25, 'descripcion' => 'SAN JUAN'],
            ['id' => 26, 'descripcion' => 'SAN PEDRO DE MACORIS'],
            ['id' => 27, 'descripcion' => 'SANCHEZ RAMIREZ'],
            ['id' => 28, 'descripcion' => 'SANTIAGO'],
            ['id' => 29, 'descripcion' => 'SANTIAGO RODRIGUEZ'],
            ['id' => 30, 'descripcion' => 'VALVERDE'],
            ['id' => 31, 'descripcion' => 'SAN JOSE DE OCOA'],
            ['id' => 32, 'descripcion' => 'SANTO DOMINGO'],
        ];

        DB::table('provincias')->insert($provincias);
    }
}
