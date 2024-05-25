<?php

namespace App\Http\Controllers\api;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();

        return json_encode(compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->cargo = $request->cargo;
        $empleado->salario = $request->salario;
        $empleado->save();

        return json_encode(compact('empleado'));
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);
        
        if (is_null($empleado)) {
            return abort(404);
        }

        return json_encode(compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        $empleado = Empleado::find($id);
        if (is_null($empleado)) {
            return abort(404);
        }

        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->cargo = $request->cargo;
        $empleado->salario = $request->salario;
        $empleado->save();

        return json_encode(compact('empleado'));
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if (is_null($empleado)) {
            return abort(404);
        }
        $empleado->delete();

        $empleados = Empleado::all();

        return json_encode(['empleados' => $empleados, 'success' => true]);
    }
}
