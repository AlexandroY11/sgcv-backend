<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\HistorialMedicoController;

// Rutas API para Citas
Route::apiResource('citas', CitaController::class);

// Rutas API para Empleados
Route::apiResource('empleados', EmpleadoController::class);

// Rutas API para Facturas
Route::apiResource('facturas', FacturaController::class);

// Rutas API para Pacientes
Route::apiResource('pacientes', PacienteController::class);

// Rutas API para Tratamientos
Route::apiResource('tratamientos', TratamientoController::class);

// Rutas API para Historiales Médicos
Route::apiResource('historiales_medicos', HistorialMedicoController::class);
