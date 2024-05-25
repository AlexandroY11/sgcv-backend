<?php

use App\Http\Controllers\api\CitaController;
use App\Http\Controllers\api\EmpleadoController;
use App\Http\Controllers\api\FacturaController;
use App\Http\Controllers\api\HistorialMedicoController;
use App\Http\Controllers\api\PacienteController;
use App\Http\Controllers\api\TratamientoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas API para Citas
Route::apiResource('/citas', CitaController::class);

// Rutas API para Empleados
Route::apiResource('/empleados', EmpleadoController::class);

// Rutas API para Facturas
Route::apiResource('/facturas', FacturaController::class);

// Rutas API para Pacientes
Route::apiResource('/pacientes', PacienteController::class);

// Rutas API para Tratamientos
Route::apiResource('/tratamientos', TratamientoController::class);

// Rutas API para Historiales Médicos
Route::apiResource('/historialesMedicos', HistorialMedicoController::class);
