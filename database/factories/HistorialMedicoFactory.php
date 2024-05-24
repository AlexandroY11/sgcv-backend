<?php

namespace Database\Factories;

use App\Models\HistorialMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistorialMedico>
 */
class HistorialMedicoFactory extends Factory
{
    protected $model = HistorialMedico::class;

    public function definition()
    {
        return [
            'detalles' => $this->faker->paragraph,
        ];
    }
}
