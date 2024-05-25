<?php

namespace App\Http\Controllers\api;

use App\Models\HistorialMedico;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HistorialMedicoController extends Controller
{
    public function index()
    {
        $historialesMedicos = HistorialMedico::all();

        return json_encode(compact('historialesMedicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'detalles' => 'required|string|max:65535',
        ]);

        $historialMedico = new HistorialMedico();
        $historialMedico->detalles = $request->detalles;
        $historialMedico->save();

        return json_encode(compact('historialMedico'));
    }

    public function show($id)
    {
        $historialMedico = HistorialMedico::find($id);
        
        if (is_null($historialMedico)) {
            return abort(404);
        }

        return json_encode(compact('historialMedico'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'detalles' => 'required|string|max:65535',
        ]);

        $historialMedico = HistorialMedico::find($id);
        if (is_null($historialMedico)) {
            return abort(404);
        }

        $historialMedico->detalles = $request->detalles;
        $historialMedico->save();

        return json_encode(compact('historialMedico'));
    }

    public function destroy($id)
    {
        $historialMedico = HistorialMedico::find($id);
        if (is_null($historialMedico)) {
            return abort(404);
        }
        $historialMedico->delete();

        $historialesMedicos = HistorialMedico::all();

        return json_encode(['historialesMedicos' => $historialesMedicos, 'success' => true]);
    }
}
