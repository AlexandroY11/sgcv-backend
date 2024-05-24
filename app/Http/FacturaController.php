<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        return response()->json($facturas);
    }

    public function store(Request $request)
    {
        $factura = Factura::create($request->all());
        return response()->json($factura, 201);
    }

    public function show($id)
    {
        $factura = Factura::find($id);
        if ($factura) {
            return response()->json($factura);
        }
        return response()->json(['message' => 'Factura no encontrada'], 404);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);
        if ($factura) {
            $factura->update($request->all());
            return response()->json($factura);
        }
        return response()->json(['message' => 'Factura no encontrada'], 404);
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);
        if ($factura) {
            $factura->delete();
            return response()->json(['message' => 'Factura eliminada']);
        }
        return response()->json(['message' => 'Factura no encontrada'], 404);
    }
}
