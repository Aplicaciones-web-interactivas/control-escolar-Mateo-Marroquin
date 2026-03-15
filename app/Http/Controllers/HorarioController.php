<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Materia;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        // Traemos los horarios con sus relaciones cargadas
        $horarios = Horario::with(['materia', 'usuario'])->get();

        return view('horarios.index', compact('horarios'));
    }

    public function crear()
    {
        // Traemos todos los datos para los select
        $materias = Materia::all();
        $profesores = Usuario::all();

        return view('horarios.crear', compact('materias', 'profesores'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        // Guardado manual (ejercicio de consulta)
        Horario::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Horario asignado');
    }

    public function editar($id)
    {
        $horario = Horario::findOrFail($id);
        $materias = Materia::all();
        $profesores = Usuario::all();

        return view('horarios.editar', compact('horario', 'materias', 'profesores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado.');
    }

    public function eliminar($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('horarios.index')->with('success', 'Horario eliminado con éxito.');
    }
}
