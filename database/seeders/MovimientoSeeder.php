<?php

namespace Database\Seeders;

use App\Models\Movimientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movimiento = Movimientos::factory(10)->create();
    }
}
