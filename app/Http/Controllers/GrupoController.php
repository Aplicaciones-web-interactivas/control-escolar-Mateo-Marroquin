<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Horario;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        // Cargamos la relación de horario y, en cascada, materia y usuario
        $grupos = Grupo::with('horario.materia', 'horario.usuario')->get();
        return view('grupos.index', compact('grupos'));
    }

    public function crear()
    {
        $horarios = Horario::with('materia', 'usuario')->get();
        return view('grupos.crear', compact('horarios'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:10',
            'horario_id' => 'required|exists:horarios,id'
        ]);

        Grupo::create($request->all());
        return redirect()->route('grupos.index')->with('success', 'Grupo creado');
    }

    public function editar($id)
    {
        $grupo = Grupo::findOrFail($id);
        $horarios = Horario::with('materia', 'usuario')->get();
        return view('grupos.editar', compact('grupo', 'horarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:10',
            'horario_id' => 'required|exists:horarios,id'
        ]);

        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->all());
        return redirect()->route('grupos.index')->with('success', 'Grupo actualizado');
    }

    public function eliminar($id)
    {
        Grupo::destroy($id);
        return redirect()->route('grupos.index')->with('success', 'Grupo eliminado');
    }
}
