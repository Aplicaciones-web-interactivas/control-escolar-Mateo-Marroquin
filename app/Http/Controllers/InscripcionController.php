<?php
namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Grupo;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index() {
        $inscripciones = Inscripcion::with(['grupo', 'user'])->get();
        return view('inscripciones.index', compact('inscripciones'));
    }

    public function crear() {
        $grupos = Grupo::all();
        $usuarios = User::all();
        return view('inscripciones.crear', compact('grupos', 'usuarios'));
    }

    public function guardar(Request $request) {
        $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Inscripcion::create($request->all());
        return redirect()->route('inscripciones.index')->with('success', 'Inscripción realizada.');
    }

    public function eliminar($id) {
        Inscripcion::destroy($id);
        return redirect()->route('inscripciones.index')->with('success', 'Inscripción eliminada.');
    }
    public function editar($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $grupos = Grupo::all();
        $usuarios = User::all();

        return view('inscripciones.editar', compact('inscripcion', 'grupos', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->update($request->all());

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción actualizada correctamente.');
    }
}
