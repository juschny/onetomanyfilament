<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','duracion'];

    public function estudiantes() {
        return $this->hasMany(Estudiante::class , 'id');
    }
}
