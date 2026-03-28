<?php

namespace Database\Factories;

use App\Models\Grupo;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->word(),
            'descripcion' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'grupo_id' => Grupo::factory(),
            'user_id' => User::factory(),
        ];
    }
}
