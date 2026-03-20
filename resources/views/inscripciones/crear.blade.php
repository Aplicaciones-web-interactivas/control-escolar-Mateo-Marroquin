@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="mb-4">
            <a href="{{ route('inscripciones.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 bg-blue-600 text-white">
                <h3 class="text-xl font-bold">Nueva Inscripción</h3>
            </div>

            <form action="{{ route('inscripciones.guardar') }}" method="POST" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alumno</label>
                    <select name="usuario_id" class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($usuarios as $u)
                            <option value="{{ $u->id }}">{{ $u->nombre }} ({{ $u->clave_institucional }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Grupo</label>
                    <select name="grupo_id" class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($grupos as $g)
                            <option value="{{ $g->id }}">{{ $g->nombre }} - {{ $g->horario->materia->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold transition shadow-lg">
                    Confirmar Inscripción
                </button>
            </form>
        </div>
    </div>
@endsection
