<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalles'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'historial_medico_id');
    }

    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class, 'historial_medico_tratamiento');
    }
}
