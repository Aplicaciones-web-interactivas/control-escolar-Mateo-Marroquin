<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
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

//oute::get('/dashboard', [M::class, 'index'])->name('dashboard');
