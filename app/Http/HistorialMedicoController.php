<?php

namespace App\Http\Controllers;

use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class Historial_MedicoController extends Controller
{
    public function index()
    {
        $historialesMedicos = HistorialMedico::all();
        return response()->json($historialesMedicos);
    }

    public function store(Request $request)
    {
        $historialMedico = HistorialMedico::create($request->all());
        return response()->json($historialMedico, 201);
    }

    public function show($id)
    {
        $historialMedico = HistorialMedico::find($id);
        if ($historialMedico) {
            return response()->json($historialMedico);
        }
        return response()->json(['message' => 'Historial Médico no encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $historialMedico = HistorialMedico::find($id);
        if ($historialMedico) {
            $historialMedico->update($request->all());
            return response()->json($historialMedico);
        }
        return response()->json(['message' => 'Historial Médico no encontrado'], 404);
    }

    public function destroy($id)
    {
        $historialMedico = HistorialMedico::find($id);
        if ($historialMedico) {
            $historialMedico->delete();
            return response()->json(['message' => 'Historial Médico eliminado']);
        }
        return response()->json(['message' => 'Historial Médico no encontrado'], 404);
    }
}

