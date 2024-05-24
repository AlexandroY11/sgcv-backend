<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return response()->json($tratamientos);
    }

    public function store(Request $request)
    {
        $tratamiento = Tratamiento::create($request->all());
        return response()->json($tratamiento, 201);
    }

    public function show($id)
    {
        $tratamiento = Tratamiento::find($id);
        if ($tratamiento) {
            return response()->json($tratamiento);
        }
        return response()->json(['message' => 'Tratamiento no encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $tratamiento = Tratamiento::find($id);
        if ($tratamiento) {
            $tratamiento->update($request->all());
            return response()->json($tratamiento);
        }
        return response()->json(['message' => 'Tratamiento no encontrado'], 404);
    }

    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        if ($tratamiento) {
            $tratamiento->delete();
            return response()->json(['message' => 'Tratamiento eliminado']);
        }
        return response()->json(['message' => 'Tratamiento no encontrado'], 404);
    }
}
