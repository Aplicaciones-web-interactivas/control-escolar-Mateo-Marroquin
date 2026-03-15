<?php

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
