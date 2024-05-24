<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'cargo',
        'salario'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}

