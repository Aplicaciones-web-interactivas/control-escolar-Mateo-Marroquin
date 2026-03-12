<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nombre',
        'clave_institucional',
        'contraseña',
        'rol',
        'activo',
    ];

    protected function casts()
    {
        return [
            'activo' => 'boolean',
        ];
    }
}
