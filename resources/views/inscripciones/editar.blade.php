@extends('layouts.app')

@section('title', 'Editar Inscripción')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="mb-6">
            <a href="{{ route('inscripciones.index') }}" class="text-gray-500 hover:text-blue-600 text-sm font-bold flex items-center transition">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-blue-700 to-blue-800 text-white text-center">
                <h3 class="text-xl font-bold uppercase tracking-wider">Modificar Inscripción</h3>
            </div>

            <form action="{{ route('inscripciones.update', $inscripcion->id) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alumno Inscrito</label>
                    <select name="usuario_id" class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                        @foreach($usuarios as $u)
                            <option value="{{ $u->id }}" @selected(old('usuario_id', $inscripcion->usuario_id) == $u->id)>
                                {{ $u->nombre }} ({{ $u->clave_institucional }})
                            </option>
                        @endforeach
                    </select>
                    @error('usuario_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Asignar a Grupo</label>
                    <select name="grupo_id" class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                        @foreach($grupos as $g)
                            <option value="{{ $g->id }}" @selected(old('grupo_id', $inscripcion->grupo_id) == $g->id)>
                                {{ $g->nombre }} - {{ $g->horario->materia->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('grupo_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4 flex gap-4">
                    <a href="{{ route('inscripciones.index') }}" class="w-1/3 text-center bg-gray-100 hover:bg-gray-200 text-gray-600 py-4 rounded-xl font-bold transition">
                        Cancelar
                    </a>
                    <button type="submit" class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold transition shadow-lg">
                        Actualizar Inscripción
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
