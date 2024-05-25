<?php

namespace App\Http\Controllers\api;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = DB::table('pacientes')
            ->join('historiales_medicos', 'historiales_medicos.id', '=', 'pacientes.historial_medico_id')
            ->select('pacientes.*', 'historiales_medicos.detalles')
            ->get();

        return json_encode(compact('pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'peso' => 'required|numeric|min:0',
            'historial_medico_id' => 'required|exists:historiales_medicos,id',
        ]);

        $paciente = new Paciente();
        $paciente->nombre = $request->nombre;
        $paciente->especie = $request->especie;
        $paciente->raza = $request->raza;
        $paciente->edad = $request->edad;
        $paciente->peso = $request->peso;
        $paciente->historial_medico_id = $request->historial_medico_id;
        $paciente->save();

        return json_encode(compact('paciente'));
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        
        if (is_null($paciente)) {
            return abort(404);
        }

        $historiales_medicos = DB::table('historiales_medicos')->orderBy('detalles')->get();

        return json_encode(compact('paciente', 'historiales_medicos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'peso' => 'required|numeric|min:0',
            'historial_medico_id' => 'required|exists:historiales_medicos,id',
        ]);

        $paciente = Paciente::find($id);
        if (is_null($paciente)) {
            return abort(404);
        }

        $paciente->nombre = $request->nombre;
        $paciente->especie = $request->especie;
        $paciente->raza = $request->raza;
        $paciente->edad = $request->edad;
        $paciente->peso = $request->peso;
        $paciente->historial_medico_id = $request->historial_medico_id;
        $paciente->save();

        return json_encode(compact('paciente'));
    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        if (is_null($paciente)) {
            return abort(404);
        }
        $paciente->delete();

        $pacientes = DB::table('pacientes')
            ->join('historiales_medicos', 'historiales_medicos.id', '=', 'pacientes.historial_medico_id')
            ->select('pacientes.*', 'historiales_medicos.detalles')
            ->get();

        return json_encode(['pacientes' => $pacientes, 'success' => true]);
    }
}
