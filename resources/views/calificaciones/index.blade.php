@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="flex mb-6">
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center text-gray-600 hover:text-blue-600 text-sm font-bold transition-all group">
                <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                Volver al Dashboard
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Panel de Calificaciones</h3>
                    <p class="text-sm text-gray-500">Listado oficial de notas por alumno y grupo.</p>
                </div>
                <a href="{{ route('calificaciones.crear') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-lg">
                    <i class="fas fa-plus-circle mr-2"></i> Asignar Calificación
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                        <th class="px-6 py-4">Alumno</th>
                        <th class="px-6 py-4">Materia / Grupo</th>
                        <th class="px-6 py-4">Nota</th>
                        <th class="px-6 py-4 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($calificaciones as $c)
                        <tr class="hover:bg-indigo-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-800">{{ $c->usuario->nombre }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold">{{ $c->grupo->horario->materia->nombre }}</div>
                                <div class="text-xs text-gray-500 italic">Grupo: {{ $c->grupo->nombre }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-bold {{ $c->calificacion >= 60 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ number_format($c->calificacion, 1) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center space-x-4">
                                    <a href="{{ route('calificaciones.editar', $c->id) }}"
                                       class="text-blue-600 hover:text-blue-800 transition transform hover:scale-110">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('calificaciones.eliminar', $c->id) }}" method="POST"
                                          class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800 transition transform hover:scale-110"
                                                onclick="return confirm('¿Eliminar esta nota?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">No hay calificaciones
                                registradas.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
