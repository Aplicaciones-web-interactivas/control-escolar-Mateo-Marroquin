<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarea extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'descripcion',
        'grupo_id',
        'user_id',
        'fecha_entrega'
    ];

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function entregas(): HasMany {
        return $this->hasMany(Entrega::class, 'tarea_id');
    }

}
