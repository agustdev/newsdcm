<?php

namespace Database\Factories;

use App\Models\Embarcaciones;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmbarcacionesFactory extends Factory
{
    protected $model = Embarcaciones::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricula' => strtoupper($this->faker->hexColor()),
            'matricula_anexa' => strtoupper($this->faker->hexColor()),
            'nombre' => $this->faker->name(),
            'no_chasis' => $this->faker->randomNumber(6, true),
            'color' => $this->faker->randomElement(['rojo', 'amarillo', 'verde', 'azul', 'blanco', 'negro', 'marron']),
            'capacidad_personas' => $this->faker->randomNumber(1, true),
            'capacidad_tripulantes' => $this->faker->randomNumber(1, true),
            'estatus' => $this->faker->randomElement(['A', 'I']),
            'pies_eslora' => $this->faker->randomNumber(2, true),
            'pulg_eslora' => $this->faker->randomNumber(2, true),
            'pies_manga' => $this->faker->randomNumber(2, true),
            'pulg_manga' => $this->faker->randomNumber(2, true),
            'pies_puntual' => $this->faker->randomNumber(2, true),
            'pulg_puntual' => $this->faker->randomNumber(2, true),
            'tonelada_bruta' => $this->faker->randomNumber(2, true),
            'tonelada_neta' => $this->faker->randomNumber(2, true),
            'tipo_embarcacion' => $this->faker->randomElement(['RECREO', 'PESCA', 'TURISMO', 'COMPETENCIA']),
            'tipo_uso' => $this->faker->randomElement(['RECREO', 'PESCA', 'TURISMO', 'COMPETENCIA']),
            'desc_estatus' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'estacionamiento' => $this->faker->country(),
            'tipo_propietario' => $this->faker->randomElement(['P', 'C']),
            'nombre_propietario' => $this->faker->name(),
            'representado_por' => $this->faker->name(),
            'no_documento' => User::all()->random()->documento,
            'dir_propietario' => $this->faker->streetAddress(),
            'fecha_validez' => now(),
            'impedimento' => $this->faker->randomElement([0, 1])
        ];
    }
}
