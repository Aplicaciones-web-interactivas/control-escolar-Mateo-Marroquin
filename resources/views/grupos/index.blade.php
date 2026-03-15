@extends('layouts.app')

@section('title', 'Lista de Grupos')

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
                    <h3 class="text-xl font-bold text-gray-800">Grupos Académicos</h3>
                    <p class="text-sm text-gray-500">Gestión de grupos y sus horarios asignados.</p>
                </div>
                <a href="{{ route('grupos.crear') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center shadow-lg">
                    <i class="fas fa-plus mr-2"></i> Crear Grupo
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                        <th class="px-6 py-4">Nombre del Grupo</th>
                        <th class="px-6 py-4">Materia / Horario</th>
                        <th class="px-6 py-4">Profesor</th>
                        <th class="px-6 py-4 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($grupos as $grupo)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4">
                                <span class="font-bold text-blue-900 bg-blue-50 px-3 py-1 rounded-full border border-blue-100">
                                    {{ $grupo->nombre }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-800">{{ $grupo->horario->materia->nombre }}</div>
                                <div class="text-xs text-gray-500 font-mono">{{ $grupo->horario->hora_inicio }} - {{ $grupo->horario->hora_fin }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $grupo->horario->usuario->nombre }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center space-x-4">
                                    <a href="{{ route('grupos.editar', $grupo->id) }}" class="text-blue-600 hover:text-blue-800 transition transform hover:scale-110">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>
                                    <form action="{{ route('grupos.eliminar', $grupo->id) }}" method="POST" class="inline m-0">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition transform hover:scale-110" onclick="return confirm('¿Eliminar el grupo {{ $grupo->nombre }}?')">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic text-sm">
                                No hay grupos registrados todavía.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
