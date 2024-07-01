<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscribirseTorneo extends Model
{
    use HasFactory;

    protected $table = 'inscribirse_torneo';

    protected $primaryKey = 'id_inscripciontorneo'; // Definir la clave primaria

    protected $fillable = [
        'id_torneo',
        'id_usuario',
        'nombre_usuario',
        'cupos_totales',
        'cupos_disponibles',
    ];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'id_torneo', 'id_torneo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
