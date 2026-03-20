<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Grupo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    public function index() {
        $calificaciones = Calificacion::with(['grupo.horario.materia', 'usuario'])->get();
        return view('calificaciones.index', compact('calificaciones'));
    }

    public function crear() {
        $grupos = Grupo::with('horario.materia')->get();
        $usuarios = Usuario::all();
        return view('calificaciones.crear', compact('grupos', 'usuarios'));
    }

    public function guardar(Request $request) {
        $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'calificacion' => 'required|numeric|min:0|max:100',
        ]);

        Calificacion::create($request->all());
        return redirect()->route('calificaciones.index')->with('success', 'Calificación registrada.');
    }

    public function editar($id) {
        $calificacion = Calificacion::findOrFail($id);
        $grupos = Grupo::with('horario.materia')->get();
        $usuarios = Usuario::all();
        return view('calificaciones.editar', compact('calificacion', 'grupos', 'usuarios'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'calificacion' => 'required|numeric|min:0|max:100',
        ]);

        $cal = Calificacion::findOrFail($id);
        $cal->update($request->all());
        return redirect()->route('calificaciones.index')->with('success', 'Calificación actualizada.');
    }

    public function eliminar($id) {
        Calificacion::destroy($id);
        return redirect()->route('calificaciones.index')->with('success', 'Registro eliminado.');
    }
}
