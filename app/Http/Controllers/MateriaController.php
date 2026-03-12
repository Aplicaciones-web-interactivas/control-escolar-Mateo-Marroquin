<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::paginate(10);

        return view('materias.materias', compact('materias'));
    }

    public function crear()
    {
        return view('materias.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave'  => 'required|string|max:20|unique:materias,clave',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia creada exitosamente.');
    }

    public function editar($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.editar', compact('materia'));
    }

    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave'  => 'required|string|max:20|unique:materias,clave,' . $id,
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('materias.index')
            ->with('success', 'Materia eliminada correctamente.');
    }

}
