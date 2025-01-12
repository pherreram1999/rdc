<?php

namespace Database\Factories;

use App\Models\Ingresos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ingresos>
 */
class IngresosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ingresos::class;
    public function definition(): array
    {
        return [
            'Monto' => $this->faker->randomFloat(2, 100, 10000), // Genera un monto entre 100 y 10000
            'Descripcion' => $this->faker->word, // Genera una oración aleatoria
            'Concepto' => $this->faker->word, // Genera una palabra aleatoria
            'Fecha' => $this->faker->dateTimeBetween('-45 days', 'now'), // Fecha entre 45 días atrás y hoy
        ];
    }
}
