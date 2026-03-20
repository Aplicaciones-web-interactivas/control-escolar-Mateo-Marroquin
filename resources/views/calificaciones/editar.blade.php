@extends('layouts.app')

@section('title', 'Editar Calificación')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="mb-6">
            <a href="{{ route('calificaciones.index') }}"
               class="text-gray-500 hover:text-indigo-600 text-sm font-bold flex items-center transition">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-indigo-600 to-indigo-800 text-white text-center">
                <h3 class="text-xl font-bold uppercase tracking-wider">Modificar Calificación</h3>
            </div>

            <form action="{{ route('calificaciones.update', $calificacion->id) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alumno</label>
                    <select name="usuario_id"
                            class="w-full p-3.5 border border-gray-200 rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none">
                        @foreach($usuarios as $u)
                            <option
                                value="{{ $u->id }}" @selected(old('usuario_id', $calificacion->usuario_id) == $u->id)>
                                {{ $u->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Grupo y Materia</label>
                    <select name="grupo_id"
                            class="w-full p-3.5 border border-gray-200 rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none">
                        @foreach($grupos as $g)
                            <option value="{{ $g->id }}" @selected(old('grupo_id', $calificacion->grupo_id) == $g->id)>
                                {{ $g->nombre }} - {{ $g->horario->materia->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nueva Calificación</label>
                    <input type="number" step="0.1" name="calificacion"
                           value="{{ old('calificacion', $calificacion->calificacion) }}"
                           class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none font-bold text-lg"
                           placeholder="Ej. 80">
                    @error('calificacion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4 flex gap-4">
                    <a href="{{ route('calificaciones.index') }}"
                       class="w-1/3 text-center bg-gray-100 hover:bg-gray-200 text-gray-600 py-4 rounded-xl font-bold transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="w-2/3 bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-xl font-bold transition shadow-lg hover:shadow-indigo-200 uppercase">
                        Actualizar Nota
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
