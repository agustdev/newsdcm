<?php

namespace Database\Seeders;

use App\Models\CapitanesRegistrados;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapitanesRegistradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $capitan = CapitanesRegistrados::factory(10)->create();
    }
}
