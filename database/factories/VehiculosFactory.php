<?php

namespace Database\Factories;

use App\Models\Conductores;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use App\Models\Vehiculos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculos>
 */
class VehiculosFactory extends Factory
{
    protected $model = Vehiculos::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marca' => $this->faker->randomElement(['Nissan', 'Corolla', 'Daihatsu', 'Mercedes']),
            'color' => $this->faker->randomElement(['rojo', 'amarillo', 'verde', 'azul', 'blanco', 'negro', 'marron']),
            'year' => date('Y'),
            'placa' => strtoupper($this->faker->hexColor()),
            'provincia' => $this->faker->randomElement(['Santo Domingo', 'Distrito Nacional', 'Samana', 'Romana']),
            'municipio' => $this->faker->randomElement(['Santo Domingo Este', 'Distrito Nacional', 'Samana', 'Bayahibe']),
            'provincia_salida' => $this->faker->randomElement(['Santo Domingo', 'Distrito Nacional', 'Samana', 'Romana']),
            'Municipio_salida' => $this->faker->randomElement(['Santo Domingo Este', 'Distrito Nacional', 'Samana', 'Bayahibe']),
            'id_provsa' => $this->faker->randomElement([1, 2, 3, 4]),
            'id_munsa' => $this->faker->randomElement([1, 2, 3, 4]),
            'idcomandancia' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'comandancia' => $this->faker->randomElement(['Santo Domingo', 'Boca Chica', 'Romana', 'Bayahibe', 'Multimodal Caucedo']),
            'sector' => $this->faker->name(),
            'calle' => $this->faker->streetAddress(),
            'observacion' => $this->faker->text(),
            'mov_id' => Movimientos::all()->random()->id,
            'emb_id' => Embarcaciones::all()->random()->id
        ];
    }
}
