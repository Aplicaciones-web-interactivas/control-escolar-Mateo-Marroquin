<?php

namespace Database\Factories;

use App\Models\Entrega;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EntregaFactory extends Factory
{
    protected $model = Entrega::class;

    public function definition(): array
    {
        return [
            'archivo' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'tarea_id' => Tarea::factory(),
        ];
    }
}
