<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapitaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $capitanias = [
            ["idcomandancia" => "001", "idprovincia" => "029", "descripcion" => "SAN PEDRO DE MACORIS"],
            ["idcomandancia" => "002", "idprovincia" => "001", "descripcion" => "ROMANA"],
            ["idcomandancia" => "002", "idprovincia" => "026", "descripcion" => "ROMANA"],
            ["idcomandancia" => "002", "idprovincia" => "027", "descripcion" => "ROMANA"],
            ["idcomandancia" => "001", "idprovincia" => "028", "descripcion" => "SAN PEDRO DE MACORIS"],
            ["idcomandancia" => "003", "idprovincia" => "032", "descripcion" => "SANTO DOMINGO"],
            ["idcomandancia" => "003", "idprovincia" => "031", "descripcion" => "SANTO DOMINGO"],
            ["idcomandancia" => "004", "idprovincia" => "017", "descripcion" => "HAINA"],
            ["idcomandancia" => "003", "idprovincia" => "030", "descripcion" => "SANTO DOMINGO"],
            ["idcomandancia" => "004", "idprovincia" => "008", "descripcion" => "HAINA"],
            ["idcomandancia" => "005", "idprovincia" => "004", "descripcion" => "AZUA"],
            ["idcomandancia" => "005", "idprovincia" => "018", "descripcion" => "AZUA"],
            ["idcomandancia" => "006", "idprovincia" => "020", "descripcion" => "BARAHONA"],
            ["idcomandancia" => "010", "idprovincia" => "022", "descripcion" => "CABO ROJO"],
            ["idcomandancia" => "005", "idprovincia" => "019", "descripcion" => "AZUA"],
            ["idcomandancia" => "005", "idprovincia" => "024", "descripcion" => "AZUA"],
            ["idcomandancia" => "006", "idprovincia" => "025", "descripcion" => "BARAHONA"],
            ["idcomandancia" => "006", "idprovincia" => "021", "descripcion" => "BARAHONA"],
            ["idcomandancia" => "006", "idprovincia" => "023", "descripcion" => "BARAHONA"],
            ["idcomandancia" => "007", "idprovincia" => "014", "descripcion" => "MANZANILLO"],
            ["idcomandancia" => "008", "idprovincia" => "003", "descripcion" => "PUERTO PLATA"],
            ["idcomandancia" => "008", "idprovincia" => "006", "descripcion" => "PUERTO PLATA"],
            ["idcomandancia" => "009", "idprovincia" => "012", "descripcion" => "SAMANÁ"],
            ["idcomandancia" => "009", "idprovincia" => "002", "descripcion" => "SAMANÁ"],
            ["idcomandancia" => "009", "idprovincia" => "010", "descripcion" => "SAMANÁ"],
            ["idcomandancia" => "009", "idprovincia" => "009", "descripcion" => "SAMANÁ"],
            ["idcomandancia" => "008", "idprovincia" => "011", "descripcion" => "PUERTO PLATA"],
            ["idcomandancia" => "008", "idprovincia" => "005", "descripcion" => "PUERTO PLATA"],
            ["idcomandancia" => "008", "idprovincia" => "007", "descripcion" => "PUERTO PLATA"],
            ["idcomandancia" => "008", "idprovincia" => "016", "descripcion" => "PUERTO PLATA"],
            ["idcomandancia" => "007", "idprovincia" => "015", "descripcion" => "MANZANILLO"],
            ["idcomandancia" => "011", "idprovincia" => "032", "descripcion" => "SANTO DOMINGO"],
        ];

        DB::table('comandancias')->insert($capitanias);
    }
}
