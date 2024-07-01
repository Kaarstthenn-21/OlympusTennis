<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_categoria', 'instructor', 'cupos_totales', 'duracion', 'fecha_inicio', 'hora_inicio', 'hora_fin', 'costo_inscripcion', 'informacion'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'clase_id');
    }
    public function decrementCupos()
    {
        $this->cupos_totales = $this->cupos_totales - 1;
        $this->save();
    }
}
