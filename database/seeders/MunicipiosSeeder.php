<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            // DISTRITO NACIONAL (id=1)
            ['descripcion' => 'DISTRITO NACIONAL', 'id_prov' => 1],

            // LA ALTAGRACIA (id=2)
            ['descripcion' => 'HIGÜEY', 'id_prov' => 2],
            ['descripcion' => 'SAN RAFAEL DEL YUMA', 'id_prov' => 2],

            // AZUA (id=3)
            ['descripcion' => 'AZUA', 'id_prov' => 3],
            ['descripcion' => 'PADRE LAS CASAS', 'id_prov' => 3],
            ['descripcion' => 'GUAYABAL', 'id_prov' => 3],
            ['descripcion' => 'PERALTA', 'id_prov' => 3],
            ['descripcion' => 'SABANA YEGUA', 'id_prov' => 3],
            ['descripcion' => 'LAS YAYAS DE VIAJAMA', 'id_prov' => 3],
            ['descripcion' => 'TABARA ARRIBA', 'id_prov' => 3],
            ['descripcion' => 'ESTEBANIA', 'id_prov' => 3],
            ['descripcion' => 'LAS CHARCAS', 'id_prov' => 3],
            ['descripcion' => 'PUEBLO VIEJO', 'id_prov' => 3],

            // BAHORUCO (id=4)
            ['descripcion' => 'NEIBA', 'id_prov' => 4],
            ['descripcion' => 'TAMAYO', 'id_prov' => 4],
            ['descripcion' => 'VILLA JARAGUA', 'id_prov' => 4],
            ['descripcion' => 'LOS RIOS ', 'id_prov' => 4],
            ['descripcion' => 'GALVAN', 'id_prov' => 4],

            // BARAHONA (id=5)
            ['descripcion' => 'BARAHONA', 'id_prov' => 5],
            ['descripcion' => 'CABRAL', 'id_prov' => 5],
            ['descripcion' => 'ENRIQUILLO', 'id_prov' => 5],
            ['descripcion' => 'VICENTE NOBLE', 'id_prov' => 5],
            ['descripcion' => 'PARAISO', 'id_prov' => 5],
            ['descripcion' => 'POLO', 'id_prov' => 5],
            ['descripcion' => 'EL PEÑON', 'id_prov' => 5],
            ['descripcion' => 'FUNDACION', 'id_prov' => 5],
            ['descripcion' => 'LAS SALINAS', 'id_prov' => 5],
            ['descripcion' => 'LA CIENAGA', 'id_prov' => 5],
            ['descripcion' => 'JAQUIMEYES', 'id_prov' => 5],

            // DAJABON (id=6)
            ['descripcion' => 'RESTAURACION', 'id_prov' => 6],
            ['descripcion' => 'DAJABON', 'id_prov' => 6],
            ['descripcion' => 'LOMA DE CABRERA', 'id_prov' => 6],
            ['descripcion' => 'PARTIDO', 'id_prov' => 6],
            ['descripcion' => 'EL PINO', 'id_prov' => 6],

            // DUARTE (id=7)
            ['descripcion' => 'SAN FRANCISCO DE MACORÍS', 'id_prov' => 7],
            ['descripcion' => 'PIMENTEL', 'id_prov' => 7],
            ['descripcion' => 'VILLA RIVA', 'id_prov' => 7],
            ['descripcion' => 'CASTILLO', 'id_prov' => 7],
            ['descripcion' => 'EUGENIO MARIA DE HOSTOS', 'id_prov' => 7],
            ['descripcion' => 'ARENOSO', 'id_prov' => 7],
            ['descripcion' => 'LAS GUARANAS', 'id_prov' => 7],

            // EL SEIBO (id=8)
            ['descripcion' => 'EL SEIBO', 'id_prov' => 8],
            ['descripcion' => 'MICHES', 'id_prov' => 8],

            // ELIAS PIÑA (id=9)
            ['descripcion' => 'BANÍCA', 'id_prov' => 9],
            ['descripcion' => 'COMENDADOR', 'id_prov' => 9],
            ['descripcion' => 'PEDRO SANTANA', 'id_prov' => 9],
            ['descripcion' => 'HONDO VALLE', 'id_prov' => 9],
            ['descripcion' => 'EL LLANO', 'id_prov' => 9],
            ['descripcion' => 'JUAN SANTIAGO ', 'id_prov' => 9],

            // ESPAILLAT (id=10)
            ['descripcion' => 'MOCA', 'id_prov' => 10],
            ['descripcion' => 'GASPAR HERNANDEZ', 'id_prov' => 10],
            ['descripcion' => 'CAYETANO GERMOSEN', 'id_prov' => 10],
            ['descripcion' => 'JAMAO AL NORTE', 'id_prov' => 10],
            ['descripcion' => 'SAN VICTOR', 'id_prov' => 10],

            // HATO MAYOR (id=11)
            ['descripcion' => 'HATO MAYOR', 'id_prov' => 11],
            ['descripcion' => 'SABANA DE LA MAR', 'id_prov' => 11],
            ['descripcion' => 'EL VALLE', 'id_prov' => 11],

            // INDEPENDENCIA (id=12)
            ['descripcion' => 'DUVERGÉ', 'id_prov' => 12],
            ['descripcion' => 'LA DESCUBIERTA', 'id_prov' => 12],
            ['descripcion' => 'JIMANI', 'id_prov' => 12],
            ['descripcion' => 'POSTRER RIO', 'id_prov' => 12],
            ['descripcion' => 'MELLA', 'id_prov' => 12],
            ['descripcion' => 'CRISTOBAL', 'id_prov' => 12],

            // LA ROMANA (id=13)
            ['descripcion' => 'LA ROMANA', 'id_prov' => 13],
            ['descripcion' => 'GUAYMATE', 'id_prov' => 13],
            ['descripcion' => 'VILLA HERMOSA', 'id_prov' => 13],

            // LA VEGA (id=14)
            ['descripcion' => 'LA VEGA', 'id_prov' => 14],
            ['descripcion' => 'JARABACOA', 'id_prov' => 14],
            ['descripcion' => 'CONSTANZA', 'id_prov' => 14],
            ['descripcion' => 'JIMA ABAJO', 'id_prov' => 14],

            // MARIA TRINIDAD SANCHEZ (id=15)
            ['descripcion' => 'CABRERA', 'id_prov' => 15],
            ['descripcion' => 'NAGUA', 'id_prov' => 15],
            ['descripcion' => 'RIO SAN JUAN', 'id_prov' => 15],
            ['descripcion' => 'EL FACTOR', 'id_prov' => 15],

            // MONSEÑOR NOUEL (id=16)
            ['descripcion' => 'BONAO', 'id_prov' => 16],
            ['descripcion' => 'MAIMON', 'id_prov' => 16],
            ['descripcion' => 'PIEDRA BLANCA', 'id_prov' => 16],

            // MONTE CRISTI (id=17)
            ['descripcion' => 'MONTECRISTI', 'id_prov' => 17],
            ['descripcion' => 'GUAYUBIN', 'id_prov' => 17],
            ['descripcion' => 'VILLA VASQUEZ', 'id_prov' => 17],
            ['descripcion' => 'PEPILLO SALCEDO', 'id_prov' => 17],
            ['descripcion' => 'CASTAÑUELAS', 'id_prov' => 17],
            ['descripcion' => 'LAS MATAS DE SANTA CRUZ', 'id_prov' => 17],

            // MONTE PLATA (id=18)
            ['descripcion' => 'BAYAGUANA', 'id_prov' => 18],
            ['descripcion' => 'YAMASA', 'id_prov' => 18],
            ['descripcion' => 'MONTE PLATA', 'id_prov' => 18],
            ['descripcion' => 'SABANA GRANDE DE BOYA', 'id_prov' => 18],
            ['descripcion' => 'PERALVILLO', 'id_prov' => 18],

            // PEDERNALES (id=19)
            ['descripcion' => 'PEDERNALES', 'id_prov' => 19],
            ['descripcion' => 'OVIEDO', 'id_prov' => 19],

            // PERAVIA (id=20)
            ['descripcion' => 'BANÍ', 'id_prov' => 20],
            ['descripcion' => 'NIZAO', 'id_prov' => 20],
            ['descripcion' => 'MATANZAS', 'id_prov' => 20],

            // PUERTO PLATA (id=21)
            ['descripcion' => 'PUERTO PLATA', 'id_prov' => 21],
            ['descripcion' => 'IMBERT', 'id_prov' => 21],
            ['descripcion' => 'ALTAMIRA', 'id_prov' => 21],
            ['descripcion' => 'LUPERON', 'id_prov' => 21],
            ['descripcion' => 'SOSUA', 'id_prov' => 21],
            ['descripcion' => 'LOS HIDALGOS', 'id_prov' => 21],
            ['descripcion' => 'GUANANICO', 'id_prov' => 21],
            ['descripcion' => 'VILLA ISABELA', 'id_prov' => 21],
            ['descripcion' => 'VILLA MONTELLANO', 'id_prov' => 21],

            // HERMANAS MIRABAL (id=22)
            ['descripcion' => 'VILLA TAPIA', 'id_prov' => 22],
            ['descripcion' => 'SALCEDO', 'id_prov' => 22],
            ['descripcion' => 'TENARES', 'id_prov' => 22],

            // SAMANA (id=23)
            ['descripcion' => 'SAMANÁ', 'id_prov' => 23],
            ['descripcion' => 'SANCHEZ', 'id_prov' => 23],
            ['descripcion' => 'LAS TERRENAS', 'id_prov' => 23],

            // SAN CRISTOBAL (id=24)
            ['descripcion' => 'SAN CRISTÓBAL', 'id_prov' => 24],
            ['descripcion' => 'VILLA ALTAGRACIA', 'id_prov' => 24],
            ['descripcion' => 'YAGUATE', 'id_prov' => 24],
            ['descripcion' => 'SABANA GRANDE DE PALENQUE', 'id_prov' => 24],
            ['descripcion' => 'BAJOS DE HAINA', 'id_prov' => 24],
            ['descripcion' => 'CAMBITA GARABITOS', 'id_prov' => 24],
            ['descripcion' => 'LOS CACAOS', 'id_prov' => 24],
            ['descripcion' => 'SAN GREGORIO DE NIGUA', 'id_prov' => 24],

            // SAN JUAN (id=25)
            ['descripcion' => 'SAN JUAN DE LA MAGUANA', 'id_prov' => 25],
            ['descripcion' => 'LAS MATAS DE FARFAN', 'id_prov' => 25],
            ['descripcion' => 'EL CERCADO', 'id_prov' => 25],
            ['descripcion' => 'VALLEJUELO', 'id_prov' => 25],
            ['descripcion' => 'BOHECHIO', 'id_prov' => 25],
            ['descripcion' => 'JUAN DE HERRERA', 'id_prov' => 25],

            // SAN PEDRO DE MACORIS (id=26)
            ['descripcion' => 'SAN PEDRO DE MACORÍS', 'id_prov' => 26],
            ['descripcion' => 'LOS LLANOS', 'id_prov' => 26],
            ['descripcion' => 'RAMON SANTANA', 'id_prov' => 26],
            ['descripcion' => 'CONSUELO', 'id_prov' => 26],
            ['descripcion' => 'QUISQUEYA', 'id_prov' => 26],
            ['descripcion' => 'GUAYACANES', 'id_prov' => 26],

            // SANCHEZ RAMIREZ (id=27)
            ['descripcion' => 'COTUÍ', 'id_prov' => 27],
            ['descripcion' => 'CEVICOS', 'id_prov' => 27],
            ['descripcion' => 'FANTINO', 'id_prov' => 27],
            ['descripcion' => 'VILLA LA MATA', 'id_prov' => 27],

            // SANTIAGO (id=28)
            ['descripcion' => 'SANTIAGO DE LOS CABALLEROS', 'id_prov' => 28],
            ['descripcion' => 'LICEY AL MEDIO', 'id_prov' => 28],
            ['descripcion' => 'TAMBORIL', 'id_prov' => 28],
            ['descripcion' => 'JANICO', 'id_prov' => 28],
            ['descripcion' => 'SAN JOSE DE LAS MATAS', 'id_prov' => 28],
            ['descripcion' => 'VILLA GONZALEZ', 'id_prov' => 28],
            ['descripcion' => 'VILLA BISONO -NAVARRETE-', 'id_prov' => 28],
            ['descripcion' => 'SABANA IGLESIA', 'id_prov' => 28],
            ['descripcion' => 'BAITOA', 'id_prov' => 28],
            ['descripcion' => 'PUÑAL', 'id_prov' => 28],

            // SANTIAGO RODRIGUEZ (id=29)
            ['descripcion' => 'SAN IGNACIO DE SABANETA', 'id_prov' => 29],
            ['descripcion' => 'VILLA LOS ALMACIGOS', 'id_prov' => 29],
            ['descripcion' => 'MONCION', 'id_prov' => 29],

            // VALVERDE (id=30)
            ['descripcion' => 'MAO', 'id_prov' => 30],
            ['descripcion' => 'ESPERANZA', 'id_prov' => 30],
            ['descripcion' => 'LAGUNA SALADA', 'id_prov' => 30],

            // SAN JOSE DE OCOA (id=31)
            ['descripcion' => 'SAN JOSÉ DE OCOA', 'id_prov' => 31],
            ['descripcion' => 'SABANA LARGA', 'id_prov' => 31],
            ['descripcion' => 'RANCHO ARRIBA', 'id_prov' => 31],

            // SANTO DOMINGO (id=32)
            ['descripcion' => 'SANTO DOMINGO ESTE', 'id_prov' => 32],
            ['descripcion' => 'SANTO DOMINGO OESTE', 'id_prov' => 32],
            ['descripcion' => 'SANTO DOMINGO NORTE', 'id_prov' => 32],
            ['descripcion' => 'BOCA CHICA', 'id_prov' => 32],
            ['descripcion' => 'SAN ANTONIO DE GUERRA', 'id_prov' => 32],
            ['descripcion' => 'PEDRO BRAND', 'id_prov' => 32],
            ['descripcion' => 'LOS ALCARRIZOS', 'id_prov' => 32],
        ];

        DB::table('municipios')->insert($municipios);
    }
}
