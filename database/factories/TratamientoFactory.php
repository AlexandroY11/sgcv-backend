<?php

namespace Database\Factories;

use App\Models\Tratamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tratamiento>
 */
class TratamientoFactory extends Factory
{
    protected $model = Tratamiento::class;

    public function definition()
    {
        return [
            'descripcion' => $this->faker->sentence,
            'costo' => $this->faker->randomFloat(2, 20, 500),
        ];
    }
}
