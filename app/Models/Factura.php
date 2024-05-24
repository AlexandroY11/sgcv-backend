<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'cita_id',
        'total',
        'fecha_emision',
        'estado'
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
