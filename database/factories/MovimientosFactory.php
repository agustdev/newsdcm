<?php

namespace Database\Factories;

use App\Models\Destinos;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use App\Models\User;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
            'marca_modelo_motor' => 'YAMAHA',
            'caballos_fuerza_motor' => '75 HP',
            'no_motor' => 3,
            'color' => $this->faker->randomElement(['rojo', 'amarillo', 'verde', 'azul', 'blanco', 'negro', 'marron']),
            'estado' => $this->faker->randomElement(['Aprobado', 'Rechazado', 'Enviado', 'En proceso']),
            'estado_alerta' => $this->faker->randomElement(['Confirmado', 'Bloqueado', 'Reenviado', 'Notificado']),
            'user_id' => User::all()->random()->id,
            'vcode' => strtoupper(substr(md5(Str::uuid()->toString()), 1, 6)),
            'emb_id' => Embarcaciones::first()->id,
            'url_id' => Str::uuid()->toString()
        ];
    }
}
