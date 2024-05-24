<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }

    public function store(Request $request)
    {
        $paciente = Paciente::create($request->all());
        return response()->json($paciente, 201);
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        if ($paciente) {
            return response()->json($paciente);
        }
        return response()->json(['message' => 'Paciente no encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        if ($paciente) {
            $paciente->update($request->all());
            return response()->json($paciente);
        }
        return response()->json(['message' => 'Paciente no encontrado'], 404);
    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        if ($paciente) {
            $paciente->delete();
            return response()->json(['message' => 'Paciente eliminado']);
        }
        return response()->json(['message' => 'Paciente no encontrado'], 404);
    }
}
