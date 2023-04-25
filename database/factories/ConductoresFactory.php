<?php

namespace Database\Factories;

use App\Models\Conductores;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use App\Models\Vehiculos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conductores>
 */
class ConductoresFactory extends Factory
{
    protected $model = Conductores::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'documento' => $this->faker->randomNumber(5),
            'telefono' => $this->faker->randomNumber(5),
            'mov_id' => Movimientos::all()->random()->id,
            'emb_id' => Embarcaciones::all()->random()->id,
            'veh_id' => Vehiculos::all()->random()->id
        ];
    }
}
