<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CapitanesRegistrados>
 */
class CapitanesRegistradosFactory extends Factory
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
            'nacionalidad' => 'DOMINICANO'
        ];
    }
}
