<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'fecha_hora',
        'tipo',
        'empleado_id',
        'estado'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function factura()
    {
        return $this->hasOne(Factura::class);
    }
}

