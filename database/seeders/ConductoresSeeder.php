<?php

namespace Database\Seeders;

use App\Models\Conductores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConductoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conductores = Conductores::factory(10)->create();
    }
}
