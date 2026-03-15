<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grupo extends Model
{
    protected $fillable = [
        'nombre',
        'horario_id',
    ];

    public function horario(): BelongsTo
    {
        return $this->belongsTo(Horario::class);
    }
}
