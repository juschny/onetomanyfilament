<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','carreras_id', 'duracion', 'horas_cursado'];

    public function carreras() {
        return $this->belongsTo(Carrera::class , 'carreras_id');
    }
}
