<?php

namespace Database\Factories;

use App\Models\Grupo;
use App\Models\Inscripcion;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InscripcionFactory extends Factory
{
    protected $model = Inscripcion::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'grupo_id' => Grupo::factory(),
            'usuario_id' => Usuario::factory(),
        ];
    }
}
