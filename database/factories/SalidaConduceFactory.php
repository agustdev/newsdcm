<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalidaConduceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idprovincia' => 1,
            'provincia' => 'Distinto Nacional',
            'idcomandancia' => 1,
            'comandancia' => 'Capitania de Puertos Santo Domingo'
        ];
    }
}
