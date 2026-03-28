<?php
namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntregaController extends Controller
{
    public function index()
    {
        $entregas = Entrega::where('user_id', auth()->id())->with('tarea')->get();
        return view('entregas.index', compact('entregas'));
    }

    public function crear()
    {
        $tareas = Tarea::all();
        return view('entregas.crear', compact('tareas'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'tarea_id' => 'required|exists:tareas,id',
            'archivo'  => 'required|mimes:pdf|max:5120', // Solo PDF, máx 5MB
        ]);

        if ($request->hasFile('archivo')) {
            $ruta = $request->file('archivo')->store('entregas', 'public');

            Entrega::create([
                'tarea_id' => $request->tarea_id,
                'user_id'  => auth()->id(),
                'archivo'  => $ruta,
            ]);
        }

        return redirect()->route('entregas.index')->with('success', 'Tarea entregada con éxito.');
    }

    public function editar($id)
    {
        $entrega = Entrega::where('user_id', auth()->id())->findOrFail($id);
        return view('entregas.editar', compact('entrega'));
    }

    public function update(Request $request, $id)
    {
        $entrega = Entrega::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'archivo' => 'required|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('archivo')) {
            Storage::disk('public')->delete($entrega->archivo);

            $ruta = $request->file('archivo')->store('entregas', 'public');
            $entrega->update(['archivo' => $ruta]);
        }

        return redirect()->route('entregas.index')->with('success', 'Entrega actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $entrega = Entrega::where('user_id', auth()->id())->findOrFail($id);
        Storage::disk('public')->delete($entrega->archivo);
        $entrega->delete();

        return redirect()->route('entregas.index')->with('success', 'Entrega eliminada.');
    }
}
