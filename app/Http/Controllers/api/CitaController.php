<?php

namespace App\Http\Controllers\api;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    public function index()
    {
        $citas = DB::table('citas')
            ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
            ->join('empleados', 'citas.empleado_id', '=', 'empleados.id')
            ->select(
                'citas.*',
                'pacientes.nombre as nombre_paciente',
                'empleados.nombre as nombre_empleado'
            )
            ->get();

        return json_encode(compact('citas'));

    }

    public function store(Request $request)
    {
        $cita = new Cita();
        $cita->paciente_id = $request->paciente_id;
        $cita->fecha_hora = $request->fecha_hora;
        $cita->tipo = $request->tipo;
        $cita->empleado_id = $request->empleado_id;
        $cita->estado = $request->estado;
        $cita->save();

        return json_encode(compact('cita'));
    }

    public function show($id)
    {
        $cita = Cita::find($id);
        
        if(is_null($cita)){
            return abort(404);
        }

        $pacientes = DB::table('pacientes')
            ->orderBy('nombre')
            ->get();
        
        $empleados = DB::table('empleados')
            ->orderBy('nombre')
            ->get();

        return json_encode(compact('cita', 'pacientes', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::find($id);
        $cita->paciente_id = $request->paciente_id;
        $cita->fecha_hora = $request->fecha_hora;
        $cita->tipo = $request->tipo;
        $cita->empleado_id = $request->empleado_id;
        $cita->estado = $request->estado;
        $cita->save();

        return json_encode(compact('cita'));
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();

        $citas = DB::table('citas')
            ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
            ->join('empleados', 'citas.empleado_id', '=', 'empleados.id')
            ->select(
                'citas.*',
                'pacientes.nombre as nombre_paciente',
                'empleados.nombre as nombre_empleado'
            )
            ->get();

        return json_encode([ 'citas' => $citas, 'success' => true]);
    }
}
