<?php

// app/Models/Factura.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo_factura',
        'monto',
        'imagen_pago',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
