@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="flex mb-6">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-600 hover:text-blue-600 text-sm font-bold transition-all group">
                <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                Volver al Dashboard
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Tareas Publicadas</h3>
                    <p class="text-sm text-gray-500">Gestiona las actividades académicas para tus grupos.</p>
                </div>
                <a href="{{ route('tareas.crear') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center shadow-lg">
                    <i class="fas fa-file-upload mr-2"></i> Nueva Tarea
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                        <th class="px-6 py-4">Título</th>
                        <th class="px-6 py-4">Grupo / Materia</th>
                        <th class="px-6 py-4">Entrega</th>
                        <th class="px-6 py-4 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($tareas as $tarea)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-800">{{ $tarea->titulo }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="block font-semibold text-blue-700">{{ $tarea->grupo->horario->materia->nombre }}</span>
                                <span class="text-gray-500">Grupo: {{ $tarea->grupo->nombre }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <i class="far fa-clock mr-1"></i> {{ date('d/m/Y H:i', strtotime($tarea->fecha_entrega)) }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('tareas.editar', $tarea->id) }}" class="text-blue-600 hover:text-blue-800 transform hover:scale-110"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('tareas.eliminar', $tarea->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transform hover:scale-110" onclick="return confirm('¿Borrar tarea?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('tareas.verEntregas', $tarea->id) }}" class="text-indigo-600 hover:text-indigo-800" title="Ver Entregas">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">No has publicado tareas aún.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
