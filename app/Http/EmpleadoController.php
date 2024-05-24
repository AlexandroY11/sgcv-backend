<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return response()->json($empleados);
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());
        return response()->json($empleado, 201);
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);
        if ($empleado) {
            return response()->json($empleado);
        }
        return response()->json(['message' => 'Empleado no encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        if ($empleado) {
            $empleado->update($request->all());
            return response()->json($empleado);
        }
        return response()->json(['message' => 'Empleado no encontrado'], 404);
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if ($empleado) {
            $empleado->delete();
            return response()->json(['message' => 'Empleado eliminado']);
        }
        return response()->json(['message' => 'Empleado no encontrado'], 404);
    }
}
