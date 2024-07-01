<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['cancha_id', 'fecha', 'horario', 'user_id']; // cambiado a cancha_id

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cancha()
    {
        return $this->belongsTo(Cancha::class); // Nueva relación
    }
}
