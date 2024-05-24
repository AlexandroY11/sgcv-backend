<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'costo'
    ];

    // Asumiendo que haya una tabla pivot historial_medico_tratamiento
    public function historialesMedicos()
    {
        return $this->belongsToMany(HistorialMedico::class, 'historial_medico_tratamiento');
    }
}
