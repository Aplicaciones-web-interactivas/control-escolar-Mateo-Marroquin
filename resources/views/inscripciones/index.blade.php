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
                    <h3 class="text-xl font-bold text-gray-800">Inscripciones</h3>
                    <p class="text-sm text-gray-500">Relación de alumnos inscritos en grupos.</p>
                </div>
                <a href="{{ route('inscripciones.crear') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-lg">
                    <i class="fas fa-user-plus mr-2"></i> Inscribir Alumno
                </a>
            </div>

            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                    <th class="px-6 py-4">Alumno</th>
                    <th class="px-6 py-4">Grupo</th>
                    <th class="px-6 py-4 text-center">Acciones</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse($inscripciones as $i)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $i->usuario->nombre }}</td>
                        <td class="px-6 py-4 text-gray-600">Grupo: {{ $i->grupo->nombre }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('inscripciones.editar', $i->id) }}"
                                   class="text-blue-600 hover:text-blue-800 transition transform hover:scale-110">
                                    <i class="fas fa-user-edit text-lg"></i>
                                </a>
                                <form action="{{ route('inscripciones.eliminar', $i->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 transition transform hover:scale-110"
                                            onclick="return confirm('¿Dar de baja esta inscripción?')">
                                        <i class="fas fa-user-minus text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-400 italic">No hay inscripciones
                            registradas.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
