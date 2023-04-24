<?php

namespace Database\Factories;

use App\Models\Destinos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destinos>
 */
class DestinosFactory extends Factory
{
    protected $model = Destinos::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->name()
        ];
    }
}
