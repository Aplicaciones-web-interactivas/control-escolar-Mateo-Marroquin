@extends('layouts.app')

@section('title', 'Agregar Materia')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('materias.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800">Registrar Nueva Materia</h3>
                <p class="text-sm text-gray-500">Ingresa los datos básicos para el sistema académico.</p>
            </div>

            <form action="{{ route('materias.guardar') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la Materia</label>
                    <input type="text"
                           name="nombre"
                           id="nombre"
                           value="{{ old('nombre') }}"
                           class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('nombre') border-red-500 @enderror"
                           placeholder="Ej. Inteligencia Artificial">
                    @error('nombre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="clave" class="block text-sm font-medium text-gray-700 mb-1">Clave de la Materia</label>
                    <input type="text"
                           name="clave"
                           id="clave"
                           value="{{ old('clave') }}"
                           class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('clave') border-red-500 @enderror"
                           placeholder="Ej. IA-101">
                    @error('clave')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t">
                    <a href="{{ route('materias.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">Cancelar</a>
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                        Guardar Materia
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
