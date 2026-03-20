<?php

namespace Database\Seeders;

use App\Models\Calificacion;
use App\Models\Grupo;
use App\Models\Horario;
use App\Models\Inscripcion;
use App\Models\Materia;
use App\Models\User;
use App\Models\Usuario;
use Database\Factories\UsuarioFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Del 1 al 5 son estudiantes y del 6 al 10 profesores
        Usuario::factory(10)->create();

        Materia::create([
            'nombre' => 'Aprendizaje Automático',
            'clave'=> 1012
        ]);
        Materia::create([
            'nombre' => 'Compúto en la nube',
            'clave'=> 1021
        ]);
        Materia::create([
            'nombre' => 'Proyectos Computacionales',
            'clave'=> 1038
        ]);

        Horario::create([
            'materia_id' => 1,
            'usuario_id' => 6,
            'hora_inicio' => '10:00',
            'hora_fin' => '11:00'
        ]);
        Horario::create([
            'materia_id' => 2,
            'usuario_id' => 7,
            'hora_inicio' => '12:00',
            'hora_fin' => '01:00'
        ]);

        Grupo::create([
            'nombre' => 'Matutino',
            'horario_id' => 1
        ]);
        Inscripcion::create([
            'grupo_id' => 1,
            'usuario_id' => 1,
        ]);
        Inscripcion::create([
            'grupo_id' => 1,
            'usuario_id' => 2,
        ]);

        Calificacion::create([
            'grupo_id' => 1,
            'usuario_id' => 1,
            'calificacion' => 80
        ]);

        Calificacion::create([
            'grupo_id' => 1,
            'usuario_id' => 2,
            'calificacion' => 40
        ]);
    }
}
