<?php

namespace Database\Seeders;

use App\Models\Vehiculos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehiculos = Vehiculos::factory(10)->create();
    }
}
