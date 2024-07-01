<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dni',
        'categoria',
        'fecha_nacimiento',
        'telefono',
        'is_admin',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'inscripciones', 'user_id', 'clase_id');
    }
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function clasesInscritas()
    {
        return $this->belongsToMany(Clase::class, 'inscripciones');
    }
}
