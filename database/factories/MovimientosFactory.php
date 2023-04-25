<?php

namespace Database\Factories;

use App\Models\Destinos;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use App\Models\User;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovimientosFactory extends Factory
{
    protected $model = Movimientos::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => now(),
            'tipo_movimiento' => $this->faker->randomElement(['D', 'C']),
            'nombre' => $this->faker->name(),
            'matricula' => Embarcaciones::first()->matricula,
            'numero_casco' => $this->faker->randomNumber(6, true),
            'color' => $this->faker->randomElement(['rojo', 'amarillo', 'verde', 'azul', 'blanco', 'negro', 'marron']),
            'estado' => $this->faker->randomElement(['Aprobado', 'Rechazado', 'Enviado', 'En proceso']),
            'user_id' => User::all()->random()->id,
            'emb_id' => Embarcaciones::first()->id,
            'url_id' => Str::uuid()->toString()
        ];
    }
}
