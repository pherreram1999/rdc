<?php

namespace Database\Factories;

use App\Models\Deudas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeudaFactory extends Factory
{
    protected $model = Deudas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'monto' => $this->faker->randomFloat(2, 100, 50000), // Monto entre 100 y 50,000
            'interes' => $this->faker->randomFloat(2, 0, 25), // Interés entre 0% y 25%
            'fecha_de_pago' => $this->faker->dateTimeBetween('-60 days', '+60 days'), // Fecha entre hace 60 días y los próximos 60 días
            'acreditor' => $this->faker->company, // Nombre de empresa ficticia
            'concepto' => $this->faker->sentence, // Oración como concepto,
          //  'tipo_adeudo_id' => $this->faker->numberBetween(1, 2), // IDs de 1 a 10 (ajusta según tus datos de `tipo_adeudos`)
        ];
    }
}
