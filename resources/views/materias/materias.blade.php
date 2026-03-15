@extends('layouts.app')

@section('title', 'Lista de Materias')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="flex mb-6">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-600 hover:text-blue-600 text-sm font-bold transition-all group">
                <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                Volver al Dashboard
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">

            <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Materias Registradas</h3>
                    <p class="text-sm text-gray-500">Catálogo de asignaturas disponibles en el sistema.</p>
                </div>
                <a href="{{ route('materias.crear')}}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center shadow-lg">
                    <i class="fas fa-plus mr-2"></i> Agregar Nueva Materia
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                        <th class="px-6 py-4">Clave</th>
                        <th class="px-6 py-4">Nombre de la Materia</th>
                        <th class="px-6 py-4 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($materias as $materia)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 font-mono text-blue-700 font-bold">{{ $materia->clave }}</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $materia->nombre }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center space-x-4">
                                    <a href="{{ route('materias.editar', $materia->id) }}" class="text-blue-600 hover:text-blue-800 transition transform hover:scale-110" title="Editar">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>

                                    <form action="{{ route('materias.eliminar', $materia->id) }}" method="POST" class="inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition transform hover:scale-110" title="Eliminar" onclick="return confirm('¿Eliminar {{ $materia->nombre }}?')">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-gray-400 italic text-sm">
                                No hay materias disponibles en este momento.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
