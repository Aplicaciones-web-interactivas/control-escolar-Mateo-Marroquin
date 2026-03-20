<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calificacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'calificacions';
    protected $fillable = [
        'grupo_id',
        'usuario_id',
        'calificacion'
    ];

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }
}
