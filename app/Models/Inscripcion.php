<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones'; 
    protected $fillable = ['clase_id', 'user_id', 'cupos', 'cupos_totales'];

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clase_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

