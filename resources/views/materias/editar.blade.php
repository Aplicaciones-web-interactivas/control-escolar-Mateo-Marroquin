@extends('layouts.app')

@section('title', 'Editar Materia')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('materias.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Cancelar y volver
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-blue-50">
                <h3 class="text-xl font-bold text-gray-800">Editar Materia: {{ $materia->nombre }}</h3>
                <p class="text-sm text-gray-500">Modifica la información necesaria de la materia.</p>
            </div>

            <form action="{{ route('materias.update', $materia->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la Materia</label>
                    <input type="text"
                           name="nombre"
                           id="nombre"
                           value="{{ old('nombre', $materia->nombre) }}"
                           class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('nombre') border-red-500 @enderror">
                    @error('nombre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="clave" class="block text-sm font-medium text-gray-700 mb-1">Clave de la Materia</label>
                    <input type="text"
                           name="clave"
                           id="clave"
                           value="{{ old('clave', $materia->clave) }}"
                           class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('clave') border-red-500 @enderror">
                    @error('clave')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                        Actualizar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
