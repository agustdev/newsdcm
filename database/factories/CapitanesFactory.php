<?php

namespace Database\Factories;

use App\Models\Destinos;
use App\Models\Movimientos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capitanes>
 */
class CapitanesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'tipo_documento' => 'Cedula',
            'documento' => $this->faker->randomNumber(5),
            'telefono' => $this->faker->randomNumber(5),
            'motivo_viaje' => $this->faker->text(),
            'nacionalidad' => 'DOMINICANO',
            'lugar_destino' => Destinos::all()->random()->descripcion,
            'lugar_salida' => Destinos::all()->random()->descripcion,
            'cantidad_tripulantes' => $this->faker->randomDigit(),
            'cantidad_pasajeros' => $this->faker->randomDigit(),
            'mov_id' => Movimientos::all()->random()->id,
            'dest_sa_id' => Destinos::all()->random()->id,
            'dest_ll_id' => Destinos::all()->random()->id
        ];
    }
}
