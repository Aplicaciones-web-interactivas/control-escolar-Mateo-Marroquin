<?php

namespace Database\Factories;

use App\Models\Calificacion;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CalificacionFactory extends Factory
{
    protected $model = Calificacion::class;

    public function definition(): array
    {
        return [
            'calificacion' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'grupo_id' => Grupo::factory(),
            'user_id' => User::factory(),
        ];
    }
}
