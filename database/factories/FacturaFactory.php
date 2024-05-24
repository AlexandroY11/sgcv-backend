<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition()
    {
        return [
            'cita_id' => Cita::factory(),
            'total' => $this->faker->randomFloat(2, 50, 1000),
            'fecha_emision' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'estado' => $this->faker->randomElement(['pendiente', 'pagada']),
        ];
    }
}
