<?php

namespace Database\Seeders;

use App\Models\Destinos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinos = Destinos::factory(5)->create();
    }
}
