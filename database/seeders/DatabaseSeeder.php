<?php

namespace Database\Seeders;

use App\Models\Cita;
use App\Models\Empleado;
use App\Models\Factura;
use App\Models\HistorialMedico;
use App\Models\Paciente;
use App\Models\Tratamiento;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Empleado::factory(10)->create();
        HistorialMedico::factory(10)->create();
        Paciente::factory(10)->create();
        Cita::factory(10)->create();
        Tratamiento::factory(10)->create();
        Factura::factory(10)->create();
    }
}
