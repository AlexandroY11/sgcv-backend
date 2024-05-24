<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Empleado;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    protected $model = Cita::class;

    public function definition()
    {
        return [
            'paciente_id' => Paciente::factory(),
            'fecha_hora' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tipo' => $this->faker->randomElement(['consulta', 'vacunación', 'cirugía']),
            'empleado_id' => Empleado::factory(),
            'estado' => $this->faker->randomElement(['pendiente', 'completada', 'cancelada']),
        ];
    }
}
