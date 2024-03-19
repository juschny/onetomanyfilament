<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido' , 'dni' , 'carreras_id', 'telefono', 'numero_legajo', 'estado'];

    public function carreras() {
        return $this->belongsTo(Carrera::class , 'carreras_id');
    }
}
