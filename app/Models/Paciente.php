<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad',
        'peso',
        'historial_medico_id'
    ];

    public function historialMedico()
    {
        return $this->hasOne(HistorialMedico::class, 'id', 'historial_medico_id');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}

