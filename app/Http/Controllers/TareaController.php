<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Grupo;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::with('grupo.horario.materia')->get();
        return view('tareas.index', compact('tareas'));
    }

    public function crear()
    {
        $grupos = Grupo::with('horario.materia')->get();
        return view('tareas.crear', compact('grupos'));
    }

    public function guardar(Request $request)
    {
        $validado = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_entrega' => 'required|date',
            'grupo_id' => 'required|exists:grupos,id',
        ]);

        $validado['user_id'] = auth()->id();

        Tarea::create($validado);

        return redirect()->route('tareas.index')->with('success', 'Tarea publicada correctamente.');
    }

    public function editar($id)
    {
        $tarea = Tarea::findOrFail($id);
        $grupos = Grupo::with('horario.materia')->get();
        return view('tareas.editar', compact('tarea', 'grupos'));
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_entrega' => 'required|date',
            'grupo_id' => 'required|exists:grupos,id',
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada.');
    }

    public function eliminar($id)
    {
        Tarea::destroy($id);
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada.');
    }

    public function verEntregas($id)
    {
        $tarea = Tarea::with(['grupo.inscripcions.user', 'entregas'])->findOrFail($id);
        $alumnos = $tarea->grupo->inscripcions->map(function($inscripcion) use ($tarea) {
            $alumno = $inscripcion->user;

            $alumno->entrega = $tarea->entregas->where('user_id', $alumno->id)->first();

            return $alumno;
        });

        return view('tareas.ver_entregas', compact('tarea', 'alumnos'));
    }
}
