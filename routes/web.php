<?php

use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\GrupoController;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::group(['middleware' => function ($request, $next) {
        if (auth()->user()->rol === 'alumno') {
            return $next($request);
        }
        return redirect()->route('dashboard');
    }], function () {
        Route::get('/dashboard-alumno', [DashboardController::class, 'indexAlumno'])->name('dashboardAlumno');
        Route::get('/mis-entregas', [EntregaController::class, 'index'])->name('entregas.index');
        Route::get('/entregas/crear', [EntregaController::class, 'crear'])->name('entregas.crear');
        Route::post('/entregas', [EntregaController::class, 'guardar'])->name('entregas.guardar');
        Route::get('/entregas/{id}/editar', [EntregaController::class, 'editar'])->name('entregas.editar');
        Route::put('/entregas/{id}', [EntregaController::class, 'update'])->name('entregas.update');
        Route::delete('/entregas/{id}', [EntregaController::class, 'eliminar'])->name('entregas.eliminar');
    });

    Route::group(['middleware' => function ($request, $next) {
        $rol = auth()->user()->rol;

        if ($rol === 'admin' || $rol === 'profesor') {
            return $next($request);
        }
        // Si un Alumno intenta entrar aquí, lo mandamos a su dashboard de alumno
        return redirect()->route('dashboardAlumno');
    }], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/materias', [MateriaController::class, 'index'])->name('materias.index');
        Route::get('/materias/crear', [MateriaController::class, 'crear'])->name('materias.crear');
        Route::post('/materias/guardar', [MateriaController::class, 'guardar'])->name('materias.guardar');
        Route::get('/materias/{id}/editar', [MateriaController::class, 'editar'])->name('materias.editar');
        Route::put('/materias/{id}', [MateriaController::class, 'update'])->name('materias.update');
        Route::delete('/materias/{id}', [MateriaController::class, 'eliminar'])->name('materias.eliminar');

        Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
        Route::get('/horarios/crear', [HorarioController::class, 'crear'])->name('horarios.crear');
        Route::post('/horarios/guardar', [HorarioController::class, 'guardar'])->name('horarios.guardar');
        Route::get('/horarios/{id}/editar', [HorarioController::class, 'editar'])->name('horarios.editar');
        Route::put('/horarios/{id}', [HorarioController::class, 'update'])->name('horarios.update');
        Route::delete('/horarios/{id}', [HorarioController::class, 'eliminar'])->name('horarios.eliminar');

        Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
        Route::get('/grupos/crear', [GrupoController::class, 'crear'])->name('grupos.crear');
        Route::post('/grupos', [GrupoController::class, 'guardar'])->name('grupos.guardar');
        Route::get('/grupos/{id}/editar', [GrupoController::class, 'editar'])->name('grupos.editar');
        Route::put('/grupos/{id}', [GrupoController::class, 'update'])->name('grupos.update');
        Route::delete('/grupos/{id}', [GrupoController::class, 'eliminar'])->name('grupos.eliminar');

        Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
        Route::get('/inscripciones/crear', [InscripcionController::class, 'crear'])->name('inscripciones.crear');
        Route::post('/inscripciones', [InscripcionController::class, 'guardar'])->name('inscripciones.guardar');
        Route::delete('/inscripciones/{id}', [InscripcionController::class, 'eliminar'])->name('inscripciones.eliminar');
        Route::get('/inscripciones/{id}/editar', [InscripcionController::class, 'editar'])->name('inscripciones.editar');
        Route::put('/inscripciones/{id}', [InscripcionController::class, 'update'])->name('inscripciones.update');

        Route::get('/calificaciones', [CalificacionController::class, 'index'])->name('calificaciones.index');
        Route::get('/calificaciones/crear', [CalificacionController::class, 'crear'])->name('calificaciones.crear');
        Route::post('/calificaciones', [CalificacionController::class, 'guardar'])->name('calificaciones.guardar');
        Route::delete('/calificaciones/{id}', [CalificacionController::class, 'eliminar'])->name('calificaciones.eliminar');
        Route::get('/calificaciones/{id}/editar', [CalificacionController::class, 'editar'])->name('calificaciones.editar');
        Route::put('/calificaciones/{id}', [CalificacionController::class, 'update'])->name('calificaciones.update');

        Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
        Route::get('/tareas/crear', [TareaController::class, 'crear'])->name('tareas.crear');
        Route::post('/tareas', [TareaController::class, 'guardar'])->name('tareas.guardar');
        Route::get('/tareas/{id}/editar', [TareaController::class, 'editar'])->name('tareas.editar');
        Route::put('/tareas/{id}', [TareaController::class, 'update'])->name('tareas.update');
        Route::delete('/tareas/{id}', [TareaController::class, 'eliminar'])->name('tareas.eliminar');

        Route::get('/tareas/{id}/entregas', [TareaController::class, 'verEntregas'])->name('tareas.verEntregas');


    });
});
