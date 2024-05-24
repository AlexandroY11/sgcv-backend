<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        return response()->json($citas);
    }

    public function store(Request $request)
    {
        $cita = Cita::create($request->all());
        return response()->json($cita, 201);
    }

    public function show($id)
    {
        $cita = Cita::find($id);
        if ($cita) {
            return response()->json($cita);
        }
        return response()->json(['message' => 'Cita no encontrada'], 404);
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::find($id);
        if ($cita) {
            $cita->update($request->all());
            return response()->json($cita);
        }
        return response()->json(['message' => 'Cita no encontrada'], 404);
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);
        if ($cita) {
            $cita->delete();
            return response()->json(['message' => 'Cita eliminada']);
        }
        return response()->json(['message' => 'Cita no encontrada'], 404);
    }
}
