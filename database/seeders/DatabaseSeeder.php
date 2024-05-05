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
            'name' => 'Starboy',
            'email' => 'nikolazt98@gmail.com',
            'documento' => '001-1838610-1',
            'is_admin' => '0',
            'password' => bcrypt('elfindesemana'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Operador',
            'email' => 'kalan_88@hotmail.com',
            'documento' => '00118386101',
            'is_admin' => '1',
            'password' => bcrypt('interjak')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Jodir Jimenez',
            'email' => 'jodirjb@gmail.com',
            'documento' => '402-3986185-5',
            'is_admin' => '0',
            'password' => bcrypt('admin777'),
        ]);

        $this->call(EmbarcacionSeeder::class);
        $this->call(DestinosSeeder::class);
        $this->call(MovimientoSeeder::class);
        $this->call(CapitanSeeder::class);
        $this->call(VehiculosSeeder::class);
        $this->call(ConductoresSeeder::class);
    }
}
