<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Agustin Aguero',
            'email' => 'agustin.aguero@gmail.com',
            'documento' => '001-1838610-1',
            'password' => bcrypt('interjak'),
        ]);

        $this->call(EmbarcacionSeeder::class);
        $this->call(DestinosSeeder::class);
        $this->call(MovimientoSeeder::class);
        $this->call(CapitanSeeder::class);
    }
}
