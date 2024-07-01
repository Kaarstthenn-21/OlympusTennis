<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $table = 'partidos';
    protected $primaryKey = 'id_partido';

    protected $fillable = [
        'id_torneo', 'ronda', 'nro_partido', 'jugador1', 'nombre_jugador1', 
        'jugador2', 'nombre_jugador2', 'cancha', 'fecha', 'ganador', 'puntaje'
    ];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'id_torneo');
    }

    public function jugador1()
    {
        return $this->belongsTo(InscribirseTorneo::class, 'jugador1');
    }

    public function jugador2()
    {
        return $this->belongsTo(InscribirseTorneo::class, 'jugador2');
    }

    public function ganador()
    {
        return $this->belongsTo(InscribirseTorneo::class, 'ganador');
    }
}
