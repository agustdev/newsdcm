<?php

namespace Database\Seeders;

use App\Models\Capitanes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CapitanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $capitan = Capitanes::factory(10)->create();
    }
}
