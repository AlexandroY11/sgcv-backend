<?php

namespace Database\Factories;

use App\Models\HistorialMedico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{

    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'especie' => $this->faker->randomElement(['perro', 'gato', 'ave', 'reptil']),
            'raza' => $this->faker->word,
            'edad' => $this->faker->numberBetween(1, 15),
            'peso' => $this->faker->randomFloat(2, 1, 40),
            'historial_medico_id' => HistorialMedico::factory(),
        ];
    }
}
