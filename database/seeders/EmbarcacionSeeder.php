<?php

namespace Database\Seeders;

use App\Models\Embarcaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmbarcacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $embarcacion = Embarcaciones::factory(8)->create();
    }
}
