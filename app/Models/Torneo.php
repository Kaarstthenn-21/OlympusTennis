<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_torneo';

    protected $fillable = [
        'id_categoria',
        'organizador',
        'nombre_torneo',
        'modalidad',
        'cupos_totales',
        'fecha_inicio',
        'costo_inscripcion',
        'descripcion'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }
}
