@extends('layouts.app')

@section('title', 'Lista de Horarios')

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
                    <h3 class="text-xl font-bold text-gray-800">Horarios Asignados</h3>
                    <p class="text-sm text-gray-500">Consulta y gestiona las horas de clase por materia.</p>
                </div>
                <a href="{{ route('horarios.crear') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center shadow-lg">
                    <i class="fas fa-calendar-plus mr-2"></i> Nuevo Horario
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                        <th class="px-6 py-4">Materia</th>
                        <th class="px-6 py-4">Profesor</th>
                        <th class="px-6 py-4">Hora</th>
                        <th class="px-6 py-4 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($horarios as $horario)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-800">
                                {{ $horario->materia->nombre }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-medium">
                                {{ $horario->usuario->nombre }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold font-mono border border-blue-200">
                                    {{ $horario->hora_inicio }} - {{ $horario->hora_fin }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center space-x-4">
                                    <a href="{{ route('horarios.editar', $horario->id) }}" class="text-blue-600 hover:text-blue-800 transition transform hover:scale-110" title="Editar">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>
                                    <form action="{{ route('horarios.eliminar', $horario->id) }}" method="POST" class="inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition transform hover:scale-110" title="Eliminar" onclick="return confirm('¿Borrar este horario?')">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic text-sm">
                                No hay horarios registrados todavía.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
