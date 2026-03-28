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
        User::factory()
            ->count(11)
            ->sequence(
                ['name' => 'Alumno 1', 'rol' => 'alumno', 'clave_institucional' => '101'],
                ['name' => 'Alumno 2', 'rol' => 'alumno', 'clave_institucional' => '102'],
                ['name' => 'Alumno 3', 'rol' => 'alumno', 'clave_institucional' => '103'],
                ['name' => 'Alumno 4', 'rol' => 'alumno', 'clave_institucional' => '104'],
                ['name' => 'Alumno 5', 'rol' => 'alumno', 'clave_institucional' => '105'],
                ['name' => 'Profesor 1', 'rol' => 'profesor', 'clave_institucional' => '106'],
                ['name' => 'Profesor 2', 'rol' => 'profesor', 'clave_institucional' => '107'],
                ['name' => 'Profesor 3', 'rol' => 'profesor', 'clave_institucional' => '108'],
                ['name' => 'Profesor 4', 'rol' => 'profesor', 'clave_institucional' => '109'],
                ['name' => 'Profesor 5', 'rol' => 'profesor', 'clave_institucional' => '110'],
                ['name' => 'ADMIN', 'rol' => 'admin', 'clave_institucional' => '0'],
            )
            ->create();

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
            'user_id' => 6,
            'hora_inicio' => '10:00',
            'hora_fin' => '11:00'
        ]);
        Horario::create([
            'materia_id' => 2,
            'user_id' => 7,
            'hora_inicio' => '12:00',
            'hora_fin' => '01:00'
        ]);

        Grupo::create([
            'nombre' => 'Matutino',
            'horario_id' => 1
        ]);
        Inscripcion::create([
            'grupo_id' => 1,
            'user_id' => 1,
        ]);
        Inscripcion::create([
            'grupo_id' => 1,
            'user_id' => 2,
        ]);

        Calificacion::create([
            'grupo_id' => 1,
            'user_id' => 1,
            'calificacion' => 80
        ]);

        Calificacion::create([
            'grupo_id' => 1,
            'user_id' => 2,
            'calificacion' => 40
        ]);
    }
}
