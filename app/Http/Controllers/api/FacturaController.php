<?php

namespace App\Http\Controllers\api;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = DB::table('facturas')
            ->join('citas', 'citas.id', '=', 'facturas.cita_id')
            ->select('facturas.*', 'citas.tipo')
            ->get();

        return json_encode(compact('facturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'total' => 'required|numeric|min:0',
            'fecha_emision' => 'required|date',
            'estado' => 'required|string|in:pendiente,pagada,anulada',
        ]);

        $factura = new Factura();
        $factura->cita_id = $request->cita_id;
        $factura->total = $request->total;
        $factura->fecha_emision = $request->fecha_emision;
        $factura->estado = $request->estado;
        $factura->save();

        return json_encode(compact('factura'));
    }

    public function show($id)
    {
        $factura = Factura::find($id);
        
        if (is_null($factura)) {
            return abort(404);
        }

        $citas = DB::table('citas')->orderBy('tipo')->get();

        return json_encode(compact('factura', 'citas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'total' => 'required|numeric|min:0',
            'fecha_emision' => 'required|date',
            'estado' => 'required|string|in:pendiente,pagada,anulada',
        ]);

        $factura = Factura::find($id);
        if (is_null($factura)) {
            return abort(404);
        }

        $factura->cita_id = $request->cita_id;
        $factura->total = $request->total;
        $factura->fecha_emision = $request->fecha_emision;
        $factura->estado = $request->estado;
        $factura->save();

        return json_encode(compact('factura'));
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);
        if (is_null($factura)) {
            return abort(404);
        }
        $factura->delete();

        $facturas = DB::table('facturas')
            ->join('citas', 'citas.id', '=', 'facturas.cita_id')
            ->select('facturas.*', 'citas.tipo as tipo_cita')
            ->get();

        return json_encode(['facturas' => $facturas, 'success' => true]);
    }
}
