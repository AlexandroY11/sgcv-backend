<?php

namespace App\Http\Controllers\api;

use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TratamientoController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamiento::all();

        return json_encode(compact('tratamientos'));

    }

    public function store(Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->costo = $request->costo;
        $tratamiento->save();

        return json_encode(compact('tratamiento'));
    }

    public function show($id)
    {
        $tratamiento = Tratamiento::find($id);
        
        if(is_null($tratamiento)){
            return abort(404);
        }

        return json_encode(compact('tratamiento'));
    }

    public function update(Request $request, $id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->costo = $request->costo;
        $tratamiento->save();

        return json_encode(compact('tratamiento'));
    }

    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();

        $tratamientos = Tratamiento::all();

        return json_encode([ 'tratamientos' => $tratamientos, 'success' => true]);

    }
}
