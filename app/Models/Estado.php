<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'materias_id' , 'condicion' , 'fecha'];

    public function materias() {
        return $this->belongsTo(Materia::class , 'materias_id');
    }

    

    
}
