<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;
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

    public function inscripcions(): HasMany
    {
        return $this->hasMany(Inscripcion::class);
    }
}
